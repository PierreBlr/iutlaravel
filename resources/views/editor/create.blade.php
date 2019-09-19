@extends('layouts/app')

@section('title')
Ajouter un éditeur
@endsection

@section('content')
    <h1>Ajouter un éditeur</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('editor.store') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="name" placeholder="nom" value="{{old('name')}}">
    <button type="submit">Créer</button>
    </form>
@endsection