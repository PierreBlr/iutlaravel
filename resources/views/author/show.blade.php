@extends('layouts/app')

@section('title'){{ $author->prenom}} {{ $author->nom}}
@endsection

@section('content')
{{ Breadcrumbs::render('author.show', $author) }}
<div class="container">
    <div class="col-md-4">
        <div class="card bg-light mb-3">
            <div class="card-header text-center">
                <h1>{{ $author->prenom}} {{ $author->nom}}</h1>
                <br>
                <h4><em>Ses oeuvres</em></h4>
            </div>
            <div class="card-body text-center">
                <ul>
                    @foreach ($author->books as $book)
                    <li style="padding:10px"><a href="{{ route('book.show', ['book' => $book]) }}">{{ $book->title}}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="row">
                    <div class="col">
                        @can('update', $author)
                        <a class='btn btn-primary' href="{{ route('author.edit', ['author'=>$author])}}">Editer</a>
                        @endcan
                    </div>
                    <div class="col">
                        @can('delete', $author)
                        <form action="{{ route('author.destroy', ['author'=>$author]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection