@extends('layouts/app')

@section('title'){{ $categorie->name}}
@endsection

@section('content')
<div class="container">
        <h1><a href="{{ route('categorie.show', ['categorie' => $categorie]) }}">{{ $categorie->name}}</a></h1>
        <br>
        <p>{{$categorie->name}}</p>
        @can('edit', $categorie)
                <a class='btn btn-primary' href="{{ route('categorie.edit', ['categorie'=>$categorie])}}">Editer</a>
        @endcan

        @can('destroy', $categorie)
        <form action="{{ route('categorie.destroy', ['categorie'=>$categorie]) }}" method="post">
        @csrf
        @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
        @endcan
</div>
@endsection