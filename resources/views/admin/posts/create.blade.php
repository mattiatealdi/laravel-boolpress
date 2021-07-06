@extends('layouts.app')

@section('content')
<div class="container">
    <h1>New post: </h1>
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
        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label for="title" class="label-control">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="label-control">Titolo</label>
                <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content') }}</textarea>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="label-control" for="category_id">Categories</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <h3>Tags</h3>
                @foreach ($tags as $tag)
                    <span class="d-inline-block mr-3 ">
                        <input type="checkbox" id="tag{{ $loop->iteration }}" name="tags[]" value="{{ $tag->id }}"
                        @if (in_array($tag->id, old('tags', []))) checked
                        @endif>
                        <label for="tag{{ $loop->iteration }}">{{ $tag->name }}</label>
                    </span>
                @endforeach
            </div>

            <div>
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
            </div>
        </form>
    </div>

</div>
@endsection
