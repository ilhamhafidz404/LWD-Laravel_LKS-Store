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
      <div class="row">
         <div class="col-md-6">
            <div class="card p-3">
               <h3>{{ $productCount }}</h3>
               <h5>Products</h5>
               <a href="{{ route("products.index") }}" class="btn btn-primary">
                See All Product
               </a>
            </div>
         </div>
         <div class="col-md-6">
            <div class="card p-3">
               <h3>
                  {{ $transactionCount }}
               </h3>
               <h5>Transaction</h5>
               <a href="/admin/transactions" class="btn btn-primary">
                See All Transaction
               </a>
            </div>
         </div>
      </div>
   </div>
@endsection