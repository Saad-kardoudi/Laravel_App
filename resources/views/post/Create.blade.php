@extends('layout')
@section('Content')
<h1>Add New Post</h1>
   <form method="POST" action="{{ route('post.store') }}">
    @csrf
        @include('post.form')
        <button class="btn btn-block btn-primary" type="submit">add post</button>        
   </form>
@endsection