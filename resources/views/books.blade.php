@extends('layouts/app')

@section('title')Books
@endsection

@section('content')
{{ Breadcrumbs::render('books') }}
<div class="container">
    <h1>Notre catalogue</h1>
    <div class="row mt-5">
        @foreach ($books as $book)
        <div class="col-md-4">
            <div class="card bg-light mb-3 mr-3">
                <div class="card-header text-center">
                    <h2><a href="{{ route('book.show', ['book' => $book]) }}">{{ $book->title}}</a></h2>
                </div>
                <img src="http://placehold.it/150x150" alt="Image du livre"
                style="height: 200px; width: 100%; display:block">
                @if ($book->author)
                <div class="card-body text-center">
                    <p><em>by</em></p>
                    <a href="{{ route('author.show', ['author'=>$book->author]) }}">{{ $book->author->prenom }}
                    {{ $book->author->nom }}</a></p>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection