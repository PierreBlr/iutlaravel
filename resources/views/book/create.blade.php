@extends('layouts/app')

@section('title')
Ajouter un livre
@endsection

@section('content')
<div class="container">
    <h1>Ajouter un livre</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('book.store') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="title" placeholder="title" value="{{old('title')}}">
    <input type="text" name="summary" placeholder="description" value="{{old('summary')}}">
    <select name="author_id">
        @foreach($authors as $author)
            <option value="{{$author->id}}" {{ $author->id == old('author_id') ? 'selected = selected' : ''}}>{{$author->prenom}} {{$author->nom}}</option>
        @endforeach
    </select>
    <select name="editor_id">
        @foreach ($editors as $editor)
            <option value="{{ $editor->id }}"{{ $editor->id == old('editor_id', $editor->editor_id) ?' selected="selected"' : '' }}>{{ $editor->name }}</option>
        @endforeach 
        <select name="categorie_id">
            @foreach ($categories as $categorie)
                <input type="checkbox" name="categorie[]" value="{{ $categorie->id}}" {{array_search($categorie->id, old('categorie', [])) !== false ? 'checked=checked': ""}}>
                <label>{{$categorie->name}}</label>
            @endforeach 
    <button type="submit">Créer</button>
    </form>
</div>
@endsection