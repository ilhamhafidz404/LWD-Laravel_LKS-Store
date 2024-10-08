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

    <div class="container">
        <div class="card p-3 mt-5 mb-5"> 
            <h2 class="mb-3">Create Product</h2>
            <form method="POST" action="{{ route("products.store") }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description"class="form-control"></textarea>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="" selected hidden>Select Category</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                                <option value="">Category not found!</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mt-5 col-12">
                        <a href="{{ route("products.index") }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection