@extends('layouts/app')

@section('title'){{ $categorie->name}}
@endsection

@section('content')
        <div class="container">
                <div class="col-md-4">
                        <div class="card bg-light mb-3">
                                <div class="card-header text-center">
                                        <h1><a href="{{ route('categorie.show', ['categorie' => $categorie]) }}">{{ $categorie->name}}</a></h1>
                                        <br>
                                </div>
                                <div class="card-body text-center">
                                        <p>{{$categorie->name}}</p>
                                        <div class="row">
                                                <div class="col">
                                                @can('edit', $categorie)
                                                        <a class='btn btn-primary' href="{{ route('categorie.edit', ['categorie'=>$categorie])}}">Editer</a>
                                                @endcan
                                                </div>
                                                <div class="col">
                                                        @can('destroy', $categorie)
                                                        <form action="{{ route('categorie.destroy', ['categorie'=>$categorie]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                                        </form>
                                                        @endcan
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
@endsection