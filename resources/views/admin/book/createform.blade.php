@extends('layouts.adminLayout')
@section('title', 'Add Book')
@section('content')
    <div class="col-sm-12 col-xl-12">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Add Book</h6>

                <div class="form-floating mb-3">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') }}">
                    <label for="title">Title</label>
                </div>
                <div class="form-floating mb-3">
                    @error('author')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control  @error('title') is-invalid @enderror" id="author"
                        name="author" value="{{ old('author') }}">
                    <label for="author">Author</label>
                </div>
                <div class="form-floating mb-3">
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <textarea name="description" class="form-control  @error('title') is-invalid @enderror"id="description"
                        style="height: 150px;">{{ old('description') }}</textarea>
                    <label for="description">Description</label>
                </div>
                <div class="form-floating mb-3">
                    @error('editionDate')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <input type="date" class="form-control @error('title') is-invalid @enderror" id="editionDate"
                        name="editionDate" value="{{ old('editionDate') }}">
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


                <button type="submit" class="btn btn-primary"> <i class='bx bx-save'></i> Add</button>
            </div>
        </form>
    </div>

@endsection
