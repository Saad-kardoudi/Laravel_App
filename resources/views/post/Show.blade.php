@extends('layout')
@section('Content')
<h2>{{ $post->title }}</h2>
<p>{{ $post->content }}</p>
<em>{{ $post->created_at }}</em>
@endsection