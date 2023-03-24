@extends('layouts.app')
@section('title', 'Blog - Pagination')
@section('content')
    <div class="row">
        <div class="col-12 text-center pt-3">
            <div class="display-3 mt-3">
                {{ config('app.name') }}
            </div>
        </div>
        <hr>
        <div class="col-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->blogHasUser->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$blogs}}
        </div>
    </div>
@endsection