@extends('layouts.app')
@section('title', 'Blog - Welcome')
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-3">
            <h1 class="display-3 mt-3">{{ config('app.name') }}</h1>
            <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quis nesciunt doloremque dolorum accusantium? Laboriosam mollitia vitae asperiores magnam ipsum debitis pariatur, qui nemo modi? Saepe.
            </p>
            <a href="{{ route('blog.index') }}" class="btn btn-primary btn-sm">Afficher le blog</a>
        </div>
    </div>
@endsection

https://codeshare.io/qPZKgX