@extends('layouts/app')

@section('title'){{ $editor->name}}
@endsection

@section('content')
        <h1><a href="{{ route('editor.show', ['editor' => $editor]) }}">{{ $editor->name}}</a></h1>
        <br>
        <p>{{$editor->name}}</p>
        <a class='btn btn-primary' href="{{ route('editor.edit', ['editor'=>$editor])}}">Editer</a>

        <form action="{{ route('editor.destroy', ['editor'=>$editor]) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
@endsection