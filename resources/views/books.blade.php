@extends('layouts/app')

@section('title')Books
@endsection

@section('content')
<div class="container">
    <h1>Books</h1>
    @foreach ($books as $book)
        <h2><a href="{{ route('book.show', ['book' => $book]) }}">{{ $book->title}}</a></h2>
        @if ($book->author)
        <p>by 
            <a href="{{ route('author.show', ['author'=>$book->author]) }}">{{ $book->author->prenom }} {{ $book->author->nom }}</a></p>
        @endif
    @endforeach
</div>
@endsection