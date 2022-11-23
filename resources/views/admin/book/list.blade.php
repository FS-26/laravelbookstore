@extends('layouts.adminLayout');
@section('title', 'Book List');

@section('content')
    <div class="bg-secondary rounded h-100 p-4">
        @if (session('success'))
            <x-alert type='success' :message="session('success')" />
        @endif
        @if (session('error'))
            <x-alert type='danger' :message="session('error')" />
        @endif
        <div class="card">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h3>Book List</h3>
                <a href="{{ route('books.create') }}" class="btn btn-md btn-info"> Add New book</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">Description</th>
                                <th scope="col">Edition Date</th>
                                <th scope="col">Picture</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->id }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->editionDate }}</td>
                                    @if ($book->picture !== null)
                                        <td><img src="{{ asset($book->picture) }}" alt="{{ $book->title }}" width="50px">
                                        </td>
                                    @else
                                        <td><img src="{{ asset('storage/images/books/default.jpg') }}"
                                                alt="{{ $book->title }}" width="50px"></td>
                                    @endif

                                    <td>
                                        <a href="{{ route('books.edit', ['book' => $book->id]) }}"
                                            class="btn btn-sm btn-success mx-1 fs-5"> <i class="bx bx-pencil"></i></a>

                                        <form class="d-inline" id="book-{{ $book->id }}" method="POST"
                                            action="{{ route('books.destroy', ['book' => $book->id]) }} ">
                                            @csrf
                                            @method('delete')
                                            <button type="button" onclick='handleDelete("book-{{ $book->id }}")'
                                                class="btn btn-sm btn-danger mx-1"> <i class="bx bx-trash fs-5"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    </div>

    <script>
        function handleDelete(idform) {
            let form = document.querySelector('#' + idform);
            // console.log(form);
            if (confirm('Etes vous sur de votre decision')) {
                form.submit();
            }
        }
    </script>
@endsection
