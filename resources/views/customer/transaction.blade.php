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
    

    <div class="container">
        <div class="card p-5 w-50 mx-auto mt-5">
            <h1 class="text-center mb-5">Transaksi</h1>
            <form action="{{ route("transactions.store") }}" method="POST">
                @csrf
                <input type="text" class="form-control" hidden name="product_id" value="{{ $_GET["productId"] }}">
                <label for="">Total Beli</label>
                <input type="text" class="form-control" name="qty">
                
                <div class="d-flex mt-3 gap-3">
                    <button type="reset" class="btn btn-danger w-100">Reset</button>
                    <button class="btn btn-primary w-100">Submit</button>
                </div>
            </form>
        </div>
    </div>   
@endsection

