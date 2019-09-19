@extends('layouts/app')

@section('title')
Editer un livre {{ $book->titre}}
@endsection

@section('content')
    <h1>Editer un livre {{ $book->titre}}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('book.update', ['book'=> $book]) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="titre" placeholder="titre" value="{{old('titre', $book->title)}}">
    <input type="text" name="description" placeholder="description" value="{{old('description', $book->summary)}}">
    <select name="author_id">
    @foreach ($authors as $author)
        <option value="{{ $author->id }}"{{ $author->id == old('author_id', $book->author_id) ?' selected="selected"' : '' }}>{{ $author->lastname }} {{ $author->firstname }}</option>
    @endforeach
    </select>
    <select name="editor_id">
    @foreach ($editors as $editor)
        <option value="{{ $editor->id }}"{{ $editor->id == old('editor_id', $editor->editor_id) ?' selected="selected"' : '' }}>{{ $editor->name }}</option>
    @endforeach 
    </select>
    @php
        $categories_selected = $book->categories()->get()->pluck('id')->all();
    @endphp
    @foreach ($categories as $categorie)
        <input type="checkbox" name="categorie[]" value="{{ $categorie->id}}" {{array_search($categorie->id, old('categorie', [])) !== false ? 'checked=checked': ""}}>
        <label>{{$categorie->name}}</label>
    @endforeach
    <button type="submit">Editer</button>
    </form>
@endsection