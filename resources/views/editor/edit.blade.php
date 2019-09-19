@extends('layouts/app')

@section('title')
Modifier un éditeur
@endsection

@section('content')
    <h1>Editer un editeur {{ $editor->name}}</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('editor.update', ['editor'=> $editor]) }}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name" placeholder="marque" value="{{old('name', $editor->name)}}">
    {{-- <select name="author_id">
        <option value=""></option>
    @foreach ($authors as $author)
        <option value="{{ $author->id }}"{{ $author->id == old('author_id', $book->author_id) ?' selected="selected"' : '' }}>{{ $author->lastname }} {{ $author->firstname }}</option>
    @endforeach
    </select> --}}

    <button type="submit">Editer</button>
    </form>
@endsection