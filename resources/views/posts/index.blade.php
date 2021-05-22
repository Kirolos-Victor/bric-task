@extends('layouts.app')
@section('content')
    <div class="container">

        <a href="{{route('posts.create')}}" class="btn btn-primary mb-2">Create Post</a>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)

                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>

                        </form>
                    </td>
            </tr>
            @endforeach

            </tbody>
        </table>

    </div>
@endsection
