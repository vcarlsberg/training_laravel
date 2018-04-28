@extends('layout')
@section('title','List Todo')
@section('content')
    <h2>List Todo</h2>
    <ul>
    @foreach($categories as $category)
        <li>{{ $category->name }}</li>
    @endforeach
    </ul>

 <a href="/category/create">Create New Todo</a>
    
@endsection()