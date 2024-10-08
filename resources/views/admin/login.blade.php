@extends('layouts.app')

@section('body')

    <div class="card p-4" style="width: 400px; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">
        <h2 class="text-center mb-3">LOGIN ADMIN</h2>
        <form method="POST" action="{{ route("adminAuthenticate") }}">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </form>
    </div>
@endsection