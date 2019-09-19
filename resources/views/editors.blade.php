@extends('layouts/app')

@section('title')Editors
@endsection

@section('content')
<div class="container">
    <div class="jumbotron bg-light mb-5">
    <h1>Editeurs</h1>
    @foreach ($editors as $editor)
    <div class="row">
        <div class="col-md-4">
                <div class="card-title">
                        <div class="card bg-light mb-3">
                            <h2><a href="{{ route('editor.show', ['editor' => $editor]) }}">{{ $editor->name}}</a></h2>
                        </div>
                </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection