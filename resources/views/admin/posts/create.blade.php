@extends('layouts.app')

@section('content')
<div class="container">
    <h1>New post: </h1>
    <div>
        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label for="title" class="label-control">Titolo</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="content" class="label-control">Titolo</label>
                <textarea type="text" class="form-control" id="content" name="content" rows="5"></textarea>
            </div>
            <div>
                <button class="btn btn-primary" type="submit">Submit</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
            </div>
        </form>
    </div>

</div>
@endsection
