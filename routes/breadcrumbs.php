<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('welcome'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('About', route('about'));
});
// Home > Livres
Breadcrumbs::for('books', function ($trail) {
    $trail->parent('home');
    $trail->push('Livres', route('books'));
});
// Home > Livre > [Livre]
Breadcrumbs::for('book.show', function ($trail, $book) {
    $trail->parent('books');
    $trail->push($book->title, route('book.show', $book->id));
});

// Home > Authors
Breadcrumbs::for('authors', function ($trail) {
    $trail->parent('home');
    $trail->push('Auteurs', route('authors'));
});
// Home > Authors > [Author]
Breadcrumbs::for('author.show', function ($trail, $author) {
    $trail->parent('authors');
    $trail->push($author->prenom, route('author.show', $author->id));
});