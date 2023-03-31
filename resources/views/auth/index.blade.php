@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-6">
                @if(!$errors->isEmpty())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <ul>
                    @foreach ( $errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('authentication') }}" method="POST">
                @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1 class="display-6">Login</h1>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" value="Save" class="btn btn-primary">
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
@endsection