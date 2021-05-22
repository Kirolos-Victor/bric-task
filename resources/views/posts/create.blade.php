@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('posts.store')}}" method="POST">
            @csrf

        <div class="form-group">
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" class="form-control">

        </div>
        <div class="form-group">
            <label for="description">
                Description
            </label>
            <textarea name="description" id="description" class="form-control">
            </textarea>

        </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{route('posts.index')}}" class="btn btn-dark">Back</a>
        </form>

    </div>
@endsection
