@extends('layouts/app')

@section('title'){{ $editor->name}}
@endsection

@section('content')
<div class="container">
        <div class="col-md-4">
                <div class="card bg-light mb-3">
                        <div class="card-header text-center">
                                <h1><a href="{{ route('editor.show', ['editor' => $editor]) }}">{{ $editor->name}}</a></h1>
                        </div>
                        <div class="card-body">
                                <h4 class="card-title">{{$editor->name}}</h4>
                                <div class="row">
                                        <div class="col">
                                                <a class='btn btn-primary' href="{{ route('editor.edit', ['editor'=>$editor])}}">Editer</a>
                                        </div>
                                        <div class="col">
                               <form action="{{ route('editor.destroy', ['editor'=>$editor]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                                        </div>
                                </div> 
                        </div>
                </div>
        </div> 
</div>
@endsection