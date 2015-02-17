<?php

Route::get('library', ['as' => 'library', 'uses' => 'GeneaLabs\Bones\Library\Controllers\BooksController@index']);

Route::resource('books', 'GeneaLabs\Bones\Library\Controllers\BooksController');
Route::resource('pages', 'GeneaLabs\Bones\Library\Controllers\PagesController');
