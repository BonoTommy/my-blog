@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="row mt-4 justify-content-center">
            <div class="col-md-4">
                <form action="{{ route('auth.create') }}" method="POST">
                @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1 class="display-6">Login</h1>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') border-red @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @error('password')
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @enderror
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