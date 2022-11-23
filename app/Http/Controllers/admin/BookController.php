<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.book.list', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.createform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'string',
            'editionDate' => 'date',
        ]);
        $validated['user_id'] = Auth::user()->id;


        $validated['picture'] = Helper::uploadFile($request, 'picture', 'book_' . time(), 'images/books');
        $validated['filePath'] = Helper::uploadFile($request, 'filePath', $validated['title'] . time(), 'pdf/books');

        $book = Book::Create($validated);

        if (isset($book)) {
            return redirect()->route('books.index')->with('success', 'Book Added Successfully.');
        }

        return back()->with('error', 'Book Insertion error');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('admin.book.editform', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $oldBook = Book::find($id);

        // dd($id);
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'description' => 'string',
            'editionDate' => 'date',
        ]);

        $oldBook->title = $validated['title'];
        $oldBook->author = $validated['author'];
        $oldBook->description = $validated['description'];
        $oldBook->editionDate = $validated['editionDate'];
        $oldBook->user_id = Auth::user()->id;

        if ($request->hasFile('picture')) {
        $oldBook->picture = Helper::uploadFile($request, 'picture', 'book_' . time(), 'images/books');
           
        }
        if ($request->hasFile('filePath')) {
        $oldBook->filePath = Helper::uploadFile($request, 'filePath', $validated['title'] . time(), 'pdf/books');
           
        }


        if ($oldBook->save()) {
            return redirect()->route('books.index')->with('success', 'Book edited successfully');
        }

        return back()->with('error', 'Book Updating error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Book::find($id);

        if ($book->delete()) {
            return redirect()->route('books.index')->with('success', 'Book Deleted successfully');
        } else {
            return back()->with('error', 'Book Updating error');
        }
    }
}