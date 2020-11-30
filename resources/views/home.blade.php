@extends('layouts/master')
@section('title', 'sajjad rakhshani')

@section('content')
    <div class="container">
        <div class="row">
            <p class="col my-3">hello {{ $user }}, welcome</p>
        </div>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-lg-4 p-2 post-div">
                    <div class="border">
                        <div class="img-div w-100" style="background: url('images/{{$post->image}}'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
                        <h5 class="p-1">{{$post->title}}</h5>
                        <p class="p-1 content">{{$post->content}}</p>
                        <a href="delete_post/{{$post->id}}" class="btn btn-danger">delete</a>
                        <a href="edit_post/{{$post->id}}" class="btn btn-primary">edit</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
