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
                        <a class="nav-link active" href="/admin/dashboard">
                        <i class="fa-solid fa-fire"></i>
                        Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/products">
                        <i class="fa-solid fa-box"></i>
                        Product
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/transactions">
                        <i class="fa-solid fa-file"></i>
                        Transaction
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-danger" href="/">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <a href="{{ route("products.index") }}" class="btn btn-primary">
            Back
        </a>
        
        <table class="table table-stripped mt-5 rounded">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">category</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <th>
                      <img src="{{ asset("storage/products/".$product->image) }}" style="width: 50px; height: 50px; object-fit: cover" class="img-thumbnail">
                  </th>
                  <td>
                      {{ $product->name }}
                  </td>
                  <td>
                      {{ $product->category->name }}
                  </td>
                  <td>
                      {{ $product->description }}
                  </td>
                  <td>
                      {{ $product->price }}
                  </td>
              </tr>
            </tbody>
        </table>
    </div>
@endsection