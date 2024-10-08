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

    <div class="container" style="min-height: 100vh">

        <div class="text-center mt-5">
            @auth
                <p class="mb-4">Hallo {{ auth()->user()->name }}</p>
            @endauth
            <h4 class="mb-0">Welcome to</h4>
            <h1>ILHAM STORE</h1>
        </div>

        <div class="card p-3 my-5 shadow-sm">
            <form action="" method="GET">
                <div class="d-flex align-items-end gap-3">
                    <div class="w-100">
                        <label for="search">Search</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="search" 
                            name="search"
                            @isset($_GET["search"])
                                value="{{ $_GET["search"] }}"
                            @endisset
                        >
                    </div>
                    <div class="d-flex gap-2">
                        @isset($_GET["search"])
                            <a href="/" class="btn btn-danger">Reset</a>
                        @endisset
                        <button class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            @forelse ($products as $product)
                <div class="col-3">
                    <div class="card">
                        <img src="{{ asset("storage/products/" . $product->image) }}" class="card-img-top" style="height: 200px; object-fit: cover">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ \Str::limit($product->description, 40) }}</p>
                            <p class="card-text">Rp {{ number_format($product->price, 0, "", ".") }}</p>
                            <button 
                                type="button" 
                                class="btn btn-primary w-100" 
                                data-bs-toggle="modal" 
                                data-bs-target="#detailProduct" 
                                onclick="detailProduct('{{$product->name}}', '{{$product->image}}', '{{ $product->description }}', '{{ $product->id }}')"
                            >
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <h3 class="text-center col-12">Data Produk kosong</h3>
            @endforelse
       </div>
    </div>
    
    <form action="{{ route("carts.store") }}" method="POST">
        <div class="modal fade" id="detailProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            @csrf
            <input type="text" value="" name="product" hidden id="productIdInput">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <img src="" class="card-img-top" style="height: 200px; object-fit: cover" id="modalImg">
                <p id="modalDesc"></p>
                </div>
                <div class="modal-footer">
                        @auth
                            <button class="btn btn-primary" type="submit">Beli</button>
                        @else
                            <a class="btn btn-danger" href="/login">
                                Login Untuk Beli
                            </a>
                        @endauth
                        
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <footer class="bg-dark text-white py-3 text-center mt-5">
        <p class="mb-0">Copyright &copy; by Ilham Hafidz</p>
    </footer>
@endsection

@section('script')
    <script>
        const detailProduct = (name, img, desc, id) => {
            const modalTitle = document.querySelector(".modal h1")
            modalTitle.innerHTML= name
            
            const modalDesc = document.getElementById("modalDesc")
            modalDesc.innerHTML= desc

            const modalImg = document.getElementById("modalImg")
            modalImg.src = "http://127.0.0.1:8000/storage/products/" + img

            const inputProductId = document.querySelector("#productIdInput")
            inputProductId.value= id
        }
    </script>
@endsection

