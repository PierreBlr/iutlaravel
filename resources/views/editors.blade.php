@extends('layouts/app')

@section('title')Editors
@endsection

@section('content')
<div class="container">
    <h1>Editeurs</h1>
    @foreach ($editors as $editor)
        <h2><a href="{{ route('editor.show', ['editor' => $editor]) }}">{{ $editor->name}}</a></h2>
    @endforeach
</div>
@endsection