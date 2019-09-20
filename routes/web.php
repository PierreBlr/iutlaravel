<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function(){

    Route::get('/author/create', 'AuthorController@create')->name('author.create');
    Route::get('book/create', 'BookController@create')->name('book.create');
    Route::get('/', 'HomeController@index')->name('welcome');

    Route::get('/about', 'HomeController@about')->name('about');

    Route::get('/books', 'BookController@index')->name('books');


    Route::get('/authors', 'AuthorController@index')->name('authors');

    Route::get('/author/{author}', 'AuthorController@show')->name('author.show');

    Route::get('/book/{book}', 'BookController@show')->name('book.show')->where('author', '[0-9]+');
    Route::delete('/author/{author}', 'AuthorController@destroy')->name('author.destroy')->where('author', '[0-9]+');
    Route::get('/author/{author}/edit', 'AuthorController@edit')->name('author.edit')->where('author', '[0-9]+');
    Route::put('/author/{author}/edit', 'AuthorController@update')->name('author.update')->where('author', '[0-9]+');
    Route::post('/author/create', 'AuthorController@store')->name('author.store');

    Route::post('/book/create', 'BookController@store')->name('book.store');
    Route::delete('/book/{book}', 'BookController@destroy')->name('book.destroy')->where('book', '[0-9]+');
    Route::get('/book/{book}/edit', 'BookController@edit')->name('book.edit')->where('book', '[0-9]+');
    Route::put('/book/{book}/edit', 'BookController@update')->name('book.update')->where('author', '[0-9]+');

    Route::get('/editor/create', 'EditorController@create')->name('editor.create');
    Route::get('/editors', 'EditorController@index')->name('editors');
    Route::get('/editor/{editor}', 'EditorController@show')->name('editor.show')->where('editor', '[0-9]+');
    Route::delete('editor/{editor}, EditorController@destroy')->name('editor.destroy')->where('editor','[0-9]+');
    Route::get('/editor/{editor}/edit', 'EditorController@edit')->name('editor.edit')->where('editor', '[0-9]+');
    Route::put('/editor/{editor}/edit', 'EditorController@update')->name('editor.update')->where('author', '[0-9]+');
    Route::resource('/editor', 'EditorController');



    Route::get('/categories', 'CategorieController@index')->name('categories');
    Route::get('/categorie/{categorie}', 'CategorieController@show')->name('categorie.show')->where('categorie', '[0-9]+');
    Route::delete('/categorie/{categorie}', 'CategorieController@destroy')->name('categorie.destroy')->where('categorie','[0-9]+');
    Route::get('/categorie/{categorie}/edit', 'CategorieController@edit')->name('categorie.edit')->where('categorie', '[0-9]+');
    Route::put('/categorie/{categorie}/edit', 'CategorieController@update')->name('categorie.update')->where('categorie', '[0-9]+');
    Route::post('/categorie/create', 'CategorieController@store')->name('categorie.store');

});

    Route::resource('/comment', 'CommentController')->except(['index', 'show', 'create']);

/*
Route::get('/test/{prenom}', function() {
    return 'Ceci est un test ' . request('prenom');
});
*/
Auth::routes();
