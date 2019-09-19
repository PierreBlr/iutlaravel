@extends('layouts/app')

@section('title')Authors
@endsection

@section('content')
<div class="container">
    <h1>Auteurs</h1>
    @foreach ($authors as $author)
        <h2><a href="{{ route('author.show', ['author' => $author]) }}">{{$author->nom}} {{$author->prenom}}</a></h2>
        {{-- <h2><a href="{{ route('book.show', ['book' => $book]) }}">{{ $book->title}}</a></h2>
        @if ($book->author)
        <p>by 
            <a href="{{ route('author.show', ['author'=>$book->author]) }}">{{ $book->author->prenom }} {{ $book->author->nom }}</a></p>
        @endif --}}
    @endforeach
</div>
@endsection