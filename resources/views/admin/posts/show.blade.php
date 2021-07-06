@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>
        @if ( $post->category )
            Category: {{ $post->category->name }}
        @else
            Nessuna categoria
        @endif
    </p>
    <div>
        @foreach ($post->tags as $tag)
            <span class="badge badge-primary">{{ $tag->name }}</span>
        @endforeach
    </div>
    <div>
        <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post) }}">EDIT</a>
    </div>
</div>
@endsection
