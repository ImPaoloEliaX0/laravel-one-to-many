@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card d-flex flex-row justify-content-between align-items-center p-3 my-2">
            <h1>My Posts</h1>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary col-1"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <div class="container">
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if ($post->category)
                                <span
                                    class="badge badge-pill badge-{{ $post->category->color }}">{{ $post->category->label }}</span>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $post->created_at }}</td>
                        <td class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-success"><i
                                    class="fa-solid fa-eye mr-2"></i></a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mr-2"><i
                                    class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No Posts</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
