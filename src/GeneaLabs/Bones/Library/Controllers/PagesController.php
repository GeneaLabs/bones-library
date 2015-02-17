<?php namespace GeneaLabs\Bones\Library\Controllers;

use GeneaLabs\Bones\Library\Models\Book;
use GeneaLabs\Bones\Library\Models\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class PagesController extends \BaseController
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

            return View::make('bones-library::pages.index', compact('pages'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::user()->hasAccessTo('create', 'any', 'page')) {
            $books = Book::orderBy('title')->get();

            return View::make('bones-library::pages.create', compact('books'));
        }

        // @todo: add access denied flash message
        return View::make('bones-library::pages.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if (Auth::user()->hasAccessTo('create', 'any', 'page')) {
            Page::create(Input::all());

            // @todo: add success flash message
            return Redirect::route('pages.index');
        }
        // @todo: add failure flash message

        return Redirect::route('pages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (Auth::user()->hasAccessTo('edit', 'any', 'page')) {
            $page = Page::findOrFail($id);
            $books = Book::orderBy('title')->get();

            return View::make('bones-library::pages.edit', compact('page', 'books'));
        }

        // @todo: add access denied flash message
        return View::make('bones-library::pages.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        if (Auth::user()->hasAccessTo('edit', 'any', 'page')) {
            $page = Page::findOrFail($id);
            $page->fill(Input::all());
            $page->save();

            // @todo: add success flash message
            return Redirect::route('pages.index');
        }
        // @todo: add failure flash message

        return Redirect::route('pages.index');
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
            Page::destroy($id);

            return Redirect::route('pages.index');
        }
    }
}