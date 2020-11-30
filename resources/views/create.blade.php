@extends('layouts/master')
@section('title', 'new post')

@section('content')
    <div class="container">
        <div class="row">
            <form action="@if(isset($post)){{route('posts.update', $post->id)}}@else{{route('posts.store')}}@endif" class="form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    @if(isset($post))
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <label for="title">post title:</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="title" required value="{{$post->title ?? ''}}">
                    <label for="content">post content:</label>
                    <textarea name="content" id="content" cols="30" rows="5" placeholder="content" class="form-control" required>{{$post->content ?? ''}}</textarea>
                    <label for="image">post image:</label>
                    @if(isset($post->image))
                        <a href="/images/{{$post->image}}" target="_blank">view image</a>
                        <input type="file" accept="image/*" class="form-control" name="image">
                    @else
                    <input type="file" accept="image/*" class="form-control" name="image" required>
                    @endif
                    <input type="submit" value="save" class="btn btn-success form-control mt-2">
                </div>
            </form>
        </div>
    </div>
@endsection
