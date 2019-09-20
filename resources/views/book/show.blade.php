@extends('layouts/app')

@section('title'){{ $book->title}}
@endsection

@section('content')
{{ Breadcrumbs::render('book.show', $book) }}
<div class="container">
    <div class="row mt-5">
        <div class="col-md-auto mr-5">
            <div class="card bg-light mb-3">
                <div class="card-header text-center">
                    <h1>{{ $book->title}}
                        <br>
                </div>
                <img src="http://placehold.it/150x150" alt="Image du livre"
                style="height: 200px; width: 100%; display:block">
                <div class="card-body text-center">
                    <p>{{$book->summary}}</p>
                    @if ($book->author)
                    <p><em>By </em></p>
                    <a href="{{ route('author.show', ['author'=>$book->author]) }}">{{ $book->author->prenom }}
                        {{ $book->author->nom }}</a></p>
                    @endif
                    @if ($book->editor)
                    <p>Edité par
                        <a href="{{ route('editor.show', ['editor'=>$book->editor]) }}">{{ $book->editor->name }}</a>
                    </p>
                    @endif
                    @if ($book->categorie)
                    <p>Appartient à la catégrie
                        <a href="{{ route('categorie.show', ['categorie'=>$book->categorie]) }}">{{ $book->categorie->name }}</a>
                    </p>
                    @endif
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <a class='btn btn-primary' href="{{ route('book.edit', ['book'=>$book])}}">Editer</a>
                    </div>
                    <div class="col">
                        <form action="{{ route('book.destroy', ['book'=>$book]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-auto ml-5">
            @can('viewAny', \App\Comment::class)
            <h2>Commentaires</h2>
            @foreach ($book->comments()->orderBy('created_at','desc')->get() as $comment)
            <p>{!! nl2br(e($comment->content), false) !!}</p>
            <p>De {{ $comment->user->name }} - {{ $comment->created_at->format('m/d/Y H:i') }}</p>
            <div class="row">
                @can('update', $comment)
                <div class="col">
                    <a class="btn btn-sm btn-primary"
                        href="{{ route('comment.edit', ['comment'=>$comment]) }}">Editer</a>
                </div>
                @endcan
                @can('delete', $comment)
                <div class="col">
                    <form action="{{ route('comment.destroy', ['comment'=>$comment]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
                    </form>
                </div>
                @endcan
            </div>
            @endforeach
            @endcan
            <br>
            <br>

            @can('create', \App\Comment::class)
            <h3>Ajouter un commentaire</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <textarea name="content" rows="5" cols="60"
                    placeholder="mon commentaire">{{ old('content') }}</textarea>
                <br>
                <button type="submit" class="btn btn-primary float-right">Envoyer</button>
            </form>
            @endcan
        </div>
    </div>
</div>
</div>
@endsection