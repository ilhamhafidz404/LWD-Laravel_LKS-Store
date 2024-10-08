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
    <div class="card p-3 shdow-md">
      <div class="d-flex align-items-center mb-4" style="justify-content: space-between">
        <div>
          <h1>Products</h1>
        </div>
        <div>
          <a href="{{ route("products.create") }}" class="btn btn-primary">
            Add Product
          </a>
        </div>
      </div>
    
      <table class="table table-stripped">
        <thead>
          <tr>
            <th scope="col" class="bg-dark text-white">#</th>
            <th scope="col" class="bg-dark text-white">Image</th>
            <th scope="col" class="bg-dark text-white">Name</th>
            <th scope="col" class="bg-dark text-white">category</th>
            <th scope="col" class="bg-dark text-white">Price</th>
            <th scope="col" class="bg-dark text-white">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($products as $index=>$product)
            <tr>
                <th scope="row">
                    {{ $index+1 }}
                </th>
                <th>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#{{ $index+1 }}Image">
                    <img src="{{ asset("storage/products/".$product->image) }}" style="width: 50px; height: 50px; object-fit: cover" class="img-thumbnail">
                  </button>
                </th>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->category->name }}
                </td>
                <td>
                    {{ $product->price }}
                </td>
                <td>
                    <div class="d-flex" style="gap: 5px">
                      <a href="{{ route("products.show", $product->id) }}" class="btn btn-primary btn-sm">
                          Show
                      </a>
                      <a href="{{ route("products.edit", $product->id) }}" class="btn btn-info btn-sm">
                          Edit
                      </a>
                      <form action="{{ route("products.destroy", $product->id) }}" method="POST">
                          @method("DELETE")
                          @csrf
                          <button onclick="return confirm('Yakin ingin')" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </div>
                </td>
            </tr>

            <div class="modal fade" id="{{ $index+1 }}Image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                      {{ $product->name }} Image
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <img src="{{ asset("storage/products/".$product->image) }}" class="img-thumbnail">
                  </div>
                </div>
              </div>
            </div>
          @empty
            <tr>
                <th scope="row" colspan="6" class="text-center">Data Kosong</th>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection