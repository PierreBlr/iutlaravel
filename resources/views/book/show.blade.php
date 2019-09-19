@extends('layouts/app')

@section('title'){{ $book->title}}
@endsection

@section('content')
    <div class="container">
        <h1><a href="{{ route('book.show', ['book' => $book]) }}">{{ $book->title}}</a></h1>
        <br>
        <p>{{$book->summary}}</p>
        @if ($book->author)
        <p>by 
            <a href="{{ route('author.show', ['author'=>$book->author]) }}">{{ $book->author->prenom }} {{ $book->author->nom }}</a></p>
        @endif
        @if ($book->editor)
        <p>Edité par 
            <a href="{{ route('editor.show', ['editor'=>$book->editor]) }}">{{ $book->editor->name }}</a></p>
        @endif
        @if ($book->categorie)
        <p>Appartient à la catégrie 
            <a href="{{ route('categorie.show', ['categorie'=>$book->categorie]) }}">{{ $book->categorie->name }}</a></p>
        @endif
        
        <a class='btn btn-primary' href="{{ route('book.edit', ['book'=>$book])}}">Editer</a>

        <form action="{{ route('book.destroy', ['book'=>$book]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    </div>
@endsection