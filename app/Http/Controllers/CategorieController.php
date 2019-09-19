<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategorieController extends Controller
{
    function index(){
        $categories = \App\Categorie::all();
        return view('categories', ['categories' => $categories]);
    }
    function show(\App\Categorie $categorie){
        return view('categorie.show', ['categorie'=>$categorie]);
    }
    function create(){
        $categorie=\App\Categorie::all();
        return view('categorie.create',['categorie'=>$categorie]);
    }
    function store(\App\Http\Requests\CategorieRequest $request){
        $data = $request->validated();
        $categorie= new \App\Categorie();
        $categorie->fill($data);
        $categorie->save();
        return redirect()->route('categorie.show', ['categorie'=> $categorie]);
    }
    function update(\App\Http\Requests\CategorieRequest $request, \App\Categorie $categorie){
        $data = $request->validated();
        $categorie->fill($data);
        $categorie->save();
        return redirect()->route('categorie.show', ['categorie'=> $categorie]);
    }
        function edit(\App\Categorie $categorie){
        return view('categorie.edit',['categorie'=>$categorie]);
    }
    function destroy(\App\Categorie $categorie){
        $categorie->delete();
        return redirect()->route('categories');
    }
}
