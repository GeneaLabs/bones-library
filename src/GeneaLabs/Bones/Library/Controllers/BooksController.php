<?php namespace GeneaLabs\Bones\Library\Controllers;

use GeneaLabs\Bones\Library\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class BooksController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        if (Auth::check() && Auth::user()->hasAccessTo('view', 'any', 'book')) {
            $books = Book::orderBy('title')->get();

            return View::make('bones-library::books.index', compact('books'));
        }
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        if (Auth::check() && Auth::user()->hasAccessTo('create', 'any', 'book')) {
            return View::make('bones-library::books.create');
        }

        // @todo: add access denied flash message
        return View::make('bones-library::books.index');
	}

    public function show($id)
    {
        if (Auth::check() && Auth::user()->hasAccessTo('inspect', 'any', 'book')) {
            $book = Book::findOrFail($id);

            return View::make('bones-library::books.show', compact('book'));
        }

        return View::make('bones-library::books.index');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        if (Auth::check() && Auth::user()->hasAccessTo('create', 'any', 'book')) {
            Book::create(Input::all());

            // @todo: add success flash message
            return Redirect::route('books.index');
        }
        // @todo: add failure flash message

        return Redirect::route('books.index');
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        if (Auth::check() && Auth::user()->hasAccessTo('edit', 'any', 'book')) {
            $book = Book::findOrFail($id);

            return View::make('bones-library::books.edit', compact('book'));
        }

        // @todo: add access denied flash message
        return View::make('bones-library::books.index');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        if (Auth::check() && Auth::user()->hasAccessTo('edit', 'any', 'book')) {
            $book = Book::findOrFail($id);
            $book->fill(Input::all());
            $book->save();

            // @todo: add success flash message
            return Redirect::route('books.index');
        }
        // @todo: add failure flash message

        return Redirect::route('books.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if (Auth::check() && Auth::user()->hasAccessTo('remove', 'any', 'book')) {
            Book::destroy($id);

            return Redirect::route('books.index');
        }
	}
}
