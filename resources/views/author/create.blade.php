@extends('layouts/app')

@section('title')
Ajouter un auteur
@endsection

@section('content')
<div class="container">
    <h1>Créer un auteur</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('author.store') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="prenom" placeholder="prenom" value="{{old('prenom')}}">
    <input type="text" name="nom" placeholder="nom" value="{{old('nom')}}">
    <button type="submit">Créer</button>
    </form>
</div>
@endsection