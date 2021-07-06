@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modify:
        <a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a>
    </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div>
        <form action="{{ route('admin.posts.update', $post) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="label-control">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="label-control">Content</label>
                <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="mb-3">
                    <label class="label-control" for="category_id">Categories</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                        <option
                        @if (old('category_id',$post->category_id) == $category_id) selected @endif
                        value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>

</div>
@endsection
