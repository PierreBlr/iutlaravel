@extends('layouts/app')

@section('title')
Ajouter une Catégorie
@endsection

@section('content')
    <h1>Créer une Catégorie</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('categorie.store') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="prenom" placeholder="prenom" value="{{old('name')}}">
    <button type="submit">Créer</button>
    </form>
@endsection