@extends('layouts/app')

@section('title')
Modifier une Catégorie
@endsection

@section('content')
    <h1>Modifier la catégorie {{ $categorie->name}}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('categorie.update', ['categorie'=> $categorie]) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name" placeholder="nom de la catégorie" value="{{old('name', $categorie->name)}}">
    <button type="submit">Editer</button>
    </form>
@endsection