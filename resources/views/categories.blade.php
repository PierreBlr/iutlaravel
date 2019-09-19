@extends('layouts/app')

@section('title')Categories
@endsection

@section('content')
<div class="container">
    <div class="jumbotron bg-light mb-5">
    <h1 class="display -3">Categories</h1>
    @foreach ($categories as $categorie)
    <div class="row">
        <div class="col-md-4">
            <div class="card-title">
                <div class="card bg-light mb-3">
                    <h2><a href="{{ route('categorie.show', ['categorie' => $categorie]) }}">{{ $categorie->name}}</a></h2>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection