@extends('layouts/app')

@section('title')
Editer un auteur {{ $author->prenom}} {{ $author->nom}}
@endsection

@section('content')
    <h1>Editer un auteur {{ $author->prenom}} {{ $author->nom}}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('author.update', ['author'=> $author]) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="prenom" placeholder="prenom" value="{{old('prenom', $author->prenom)}}">
    <input type="text" name="nom" placeholder="nom" value="{{old('nom', $author->nom)}}">
    <button type="submit">Editer</button>
    </form>
@endsection