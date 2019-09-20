@extends('layouts/app')

@section('title')Authors
@endsection

@section('content')
{{ Breadcrumbs::render('authors') }}
    <div class="container">
        <div class="jumbotron bg-light mb-5">
        <h1>Auteurs</h1>
        @foreach ($authors as $author)
        <div class="row">
            <div class="col-md-4">
                <div class="card-title">
                    <div class="card bg-light mb-3">
                        <h2><a href="{{ route('author.show', ['author' => $author]) }}">{{$author->nom}} {{$author->prenom}}</a></h2>
        {{-- <h2><a href="{{ route('book.show', ['book' => $book]) }}">{{ $book->title}}</a></h2>
        @if ($book->author)
        <p>by 
            <a href="{{ route('author.show', ['author'=>$book->author]) }}">{{ $book->author->prenom }} {{ $book->author->nom }}</a></p>
        @endif --}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
@endsection