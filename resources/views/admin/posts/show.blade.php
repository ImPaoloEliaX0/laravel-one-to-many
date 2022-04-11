@extends('layouts.app')

@section('content')
    <div class="container card">
        <h1>{{ $post->title }}</h1>
        <div class="clearfix">
            @if ($post->image)
                <img class=" float-left mr-2 w-25" src="{{ $post->image }}" alt="{{ $post->slug }}">
            @endif
            <p>{{ $post->content }}</p>
        </div>
        <time>{{ $post->created_at }}</time>
        <div class="d-flex align-items-center justify-content-end">
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mr-2"><i
                    class="fa-solid fa-pencil"></i> Edit</a>
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger mr-2"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mr-2"><i
                    class="fa-solid fa-rotate-left"></i>Back</a>
        </div>
    </div>
@endsection
