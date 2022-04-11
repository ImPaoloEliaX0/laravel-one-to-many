@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-3 p-3">
            <h1>New Post</h1>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif
        <div class="card p-3">
            <form method="POST" action="{{ route('admin.posts.store') }}">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category_id">
                            <option value="">---</option>
                            @foreach ($categories as $category)
                                <option @if (old('category_id') == $category->id) selected @endif value="{{ $category->id }}">
                                    {{ $category->label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="mb-3 form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" aria-describedby="Title" name="title">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="from-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="col-11">
                        <div class="mb-3 form-group">
                            <label for="image" class="form-label">Image</label>
                            <input type="url" class="form-control" id="image" aria-describedby="Image" name="image"
                                placeholder="Image Url">
                        </div>
                    </div>
                    <div class="col-1 mt-2">
                        <img src="https://www.emme2servizi.it/wp-content/uploads/2020/12/no-image.jpg" alt="placeholder"
                            class="img-fluid" id="prewiew">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk mr-2"></i> Save</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="">
        const placeholder = "https://www.emme2servizi.it/wp-content/uploads/2020/12/no-image.jpg"
        const imageInput = document.getElementById('image');
        const imageInput = document.getElementById('preview');

        imageInput.addEventListener('change', e => {
            const url = imageInput.value;
            if (url) {
                imagePreview.setAttribute('src', url);
            } else {
                imagePreview.setAttribute('src', placeholder);
            }
        })
    </script>
@endsection
