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
          <h1>Transaction</h1>
        </div>
        <div>
          <a href="/admin/dashboard" class="btn btn-secondary">
            Kembali
          </a>
        </div>
      </div>
    
      <table class="table table-stripped">
        <thead>
          <tr>
            <th scope="col" class="bg-dark text-white">#</th>
            <th scope="col" class="bg-dark text-white">Invoice</th>
            <th scope="col" class="bg-dark text-white">Nama Customer</th>
            <th scope="col" class="bg-dark text-white">Nama Produk</th>
            <th scope="col" class="bg-dark text-white">Harga Produk</th>
            <th scope="col" class="bg-dark text-white">Total Beli</th>
            <th scope="col" class="bg-dark text-white">Tanggal Beli</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($transactions as $index=>$transaction)
            <tr>
                <th scope="row">
                    {{ $index+1 }}
                </th>
                <td>{{ $transaction->transaction->invoice }}</td>
                <td>{{ $transaction->transaction->user->name }}</td>
                <td>
                    {{ $transaction->product->name }}
                </td>
                <td>
                    {{ $transaction->product->price }}
                </td>
                <td>
                  {{ $transaction->total }}
                </td>
                <td>
                  {{ $transaction->transaction->date }}
                </td>
            </tr>
          @empty
            <tr>
                <th scope="row" class="text-center" colspan="7">No Data</th>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection