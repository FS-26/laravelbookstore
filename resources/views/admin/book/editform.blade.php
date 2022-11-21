@extends('layouts.adminLayout')
@section('title', 'Edit Book')
@section('content')
    <div class="col-sm-12 col-xl-12">
        <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Edit Book</h6>

                <div class="form-floating mb-3">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="  {{ old('title', $book->title) }}">
                    <label for="title">Title</label>
                </div>
                <div class="form-floating mb-3">
                    @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control  @error('title') is-invalid @enderror" id="author"
                        name="author" value="  {{ $book->author }} {{ old('author') }}">
                    <label for="author">Author</label>
                </div>
                <div class="form-floating mb-3">
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea name="description" class="form-control  @error('title') is-invalid @enderror"id="description"
                        style="height: 150px;">{{ $book->description }} {{ old('description') }}</textarea>
                    <label for="description">Description</label>
                </div>
                <div class="form-floating mb-3">
                    @error('editionDate')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="date" class="form-control @error('title') is-invalid @enderror" id="editionDate"
                        name="editionDate" value="{{ $book->editionDate }} {{ old('editionDate') }}">
                    <label for="editionDate">Edition-Date</label>
                </div>
                <div class="mb-3">
                    <label for="picture" class="form-label">Picture</label>
                    <input class="form-control bg-dark" type="file" name="picture" id="picture">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">File Path</label>
                    <input class="form-control bg-dark" type="file" id="file" name="filePath">
                </div>


                <button type="submit" class="btn btn-success"> <i class='bx bx-save'></i> Edit</button>
            </div>
        </form>
    </div>

@endsection
