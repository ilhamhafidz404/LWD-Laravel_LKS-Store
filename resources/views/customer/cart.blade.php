@extends('layouts.app')

@section('body')

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                Ilham Store
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto d-flex align-items-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">
                            <i class="fa-solid fa-home"></i>
                            Beranda
                        </a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('carts.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Keranjang
                        </a>
                    </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route("logout") }}">
                                @csrf
                                <button class="btn btn-sm btn-danger">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('login') }}">
                                <i class="fa-solid fa-right-to-bracket"></i>
                                Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4 mb-2">
        <div class="mb-2 d-flex align-items-center gap-2">
            <h1>Keranjang</h1>
            <span class="badge bg-success">{{ $products->count() }}</span>
        </div>
        <div class="row mt-3">
            @forelse ($products as $product)
                <div class="col-3">
                    <div class="card">
                        <img src="{{ asset("storage/products/" . $product->product->image) }}" class="card-img-top" style="height: 200px; object-fit: cover">
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $product->product->name }}
                            </h5>
                            <p class="card-text">
                                {{ \Str::limit($product->product->description, 40) }}
                            </p>
                            <p class="card-text">
                                Rp {{ number_format($product->product->price, 0, "", ".") }}
                            </p>

                            <div class="d-flex gap-2">
                                <a 
                                    href="{{ route(
                                        'transactions.create', 
                                        ["productId" => $product->product_id]) 
                                    }}" 
                                    class="btn btn-primary w-100"
                                >
                                    Beli
                                </a>

                                <form action="{{ route('carts.destroy', $product->id) }}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <input type="text" name="id" value="{{ $product->id }}" hidden>
                                    <button onclick="return confirm('yakin?')" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center text-white col-12">Data Produk kosong</h3>
            @endforelse
       </div>
    </div>   
@endsection

