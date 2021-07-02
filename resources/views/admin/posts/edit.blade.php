@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modify:
        <a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a>
    </h1>
    <div>
        <form action="{{ route('admin.posts.update', $post) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="label-control">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="content" class="label-control">Content</label>
                <textarea type="text" class="form-control" id="content" name="content" rows="5">{{ $post->content }}</textarea>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>

</div>
@endsection
