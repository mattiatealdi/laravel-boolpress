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
        <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post) }}">EDIT</a>
    </div>
</div>
@endsection
