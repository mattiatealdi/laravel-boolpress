@extends('layouts.app')

@section('content')
<div class="container">
    <h1>I miei Posts</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td><a class="btn btn-primary" href="{{ route('admin.posts.show', $post) }}">SHOW</a></td>
                    <td><a class="btn btn-secondary" href="{{ route('admin.posts.edit', $post) }}">EDIT</a></td>
                    <td><a class="btn btn-danger" href="{{ route('admin.posts.destroy', $post) }}">DELETE</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

