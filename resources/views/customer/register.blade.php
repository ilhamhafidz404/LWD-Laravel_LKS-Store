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

    <div class="card p-4" style="width: 400px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
        <h2 class="text-center mb-3">REGISTER CUSTOMER</h2>
        <form method="POST" action="{{ route("registration") }}">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary w-100 mb-3">Registrasi</button>
              <a href={{ route("login") }} class="w-100 mt-2">Kembali</a>
            </div>
          </form>
    </div>
@endsection