@extends('layouts/app')

@section('title'){{ $author->prenom}} {{ $author->nom}}
@endsection

@section('content')
<div class="container">
    <h1>{{ $author->prenom}} {{ $author->nom}}</h1>
    
    <ul>
    @foreach ($author->books as $book)
        <li><a href="{{ route('book.show', ['book' => $book]) }}">{{ $book->title}}</a></li>            
    @endforeach
    </ul>
    @can('update', $author)
    <a class='btn btn-primary' href="{{ route('author.edit', ['author'=>$author])}}">Editer</a>
    @endcan

    @can('delete', $author)
        <form action="{{ route('author.destroy', ['author'=>$author]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
    @endcan
</div>    
@endsection