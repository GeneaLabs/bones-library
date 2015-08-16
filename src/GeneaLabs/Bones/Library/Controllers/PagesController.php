<?php namespace GeneaLabs\Bones\Library\Controllers;

use GeneaLabs\Bones\Library\Models\Book;
use GeneaLabs\Bones\Library\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::user()->hasAccessTo('view', 'any', 'page')) {
            $pages = Page::orderBy('title')->get();

            return view('genealabs-bones-library::pages.index', compact('pages'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::user()->hasAccessTo('add', 'any', 'page')) {
            $books = Book::orderBy('title')->get();
            $selectedBook = (Input::has('book')) ? Input::get('book') : null;

            return view('genealabs-bones-library::pages.create', compact('books', 'selectedBook'));
        }

        // @todo: add access denied flash message
        return view('genealabs-bones-library::pages.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if (Auth::user()->hasAccessTo('add', 'any', 'page')) {
            Page::create(Input::all());

            // @todo: add success flash message
            return Redirect::route('books.show', Input::get('book_id'));
        }
        // @todo: add failure flash message

        return redirect()->route('pages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasAccessTo('change', 'any', 'page')) {
            $page = Page::findOrFail($id);
            $books = Book::orderBy('title')->get();

            return view('genealabs-bones-library::pages.edit', compact('page', 'books'));
        }

        // @todo: add access denied flash message
        return view('genealabs-bones-library::pages.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if (Auth::user()->hasAccessTo('change', 'any', 'page')) {
            $page = Page::findOrFail($id);
            $page->fill(Input::all());
            $page->save();

            // @todo: add success flash message
            return redirect()->route('books.show', Input::get('book_id'));
        }
        // @todo: add failure flash message

        return redirect()->route('pages.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        if (Auth::user()->hasAccessTo('remove', 'any', 'page')) {
            $bookId = Page::findOrFail($id)->book->id;
            Page::destroy($id);

            return redirect()->route('books.show', $bookId);
        }
    }
}
