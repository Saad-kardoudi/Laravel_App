@extends('layout')
@section('Content')
<h1>Edit Post</h1>
<form method="POST" action="{{ route('post.update',['post'=>$post->id]) }}">
    @csrf
    @method('PUT')
        @include('post.form')        
        <button class="btn btn-block btn-warning" type="submit">Update post</button>
   </form>
@endsection