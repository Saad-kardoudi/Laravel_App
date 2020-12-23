@extends('layout')
@section('Content')
    <h1>list of post</h1>
        <ul class="list-group" style="display: grid;grid-template-columns: 1fr 1fr 1fr;">
            @foreach ($posts as $post)
             <li class="list-group-item">
             <h2><a href="{{ route('post.show', ['post'=>$post->id]) }}">{{ $post->title }}</a></h2>
                <p>{{ $post->content }}</p>
                <em>{{ $post->created_at->diffForHumans() }}</em>
                @if ($post->comments_count)
                <span class="badge badge-info">{{$post->comments_count}} Comments</span>
                @else
                <span class="badge badge-danger">No Comments Yet</span>  
                @endif 
                <a class="btn btn-warning" href="{{ route('post.edit', ['post'=>$post->id]) }}">Edit</a>
                <form style="display: inline" method="POST" action="{{ route('post.destroy',['post'=>$post->id]) }}">
                    @csrf
                    @method('DELETE')                        
                        <button class="btn btn-danger" type="submit">DELETE</button>
                   </form>
                </li>   
            @endforeach
        </ul>
@endsection