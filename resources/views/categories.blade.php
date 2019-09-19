@extends('layouts/app')

@section('title')Categories
@endsection

@section('content')
<div class="container">
    <h1>Categories</h1>
    @foreach ($categories as $categorie)
        <h2><a href="{{ route('categorie.show', ['categorie' => $categorie]) }}">{{ $categorie->name}}</a></h2>
    @endforeach
</div>
@endsection