@extends('layout')
@section('title','Form todo')
@section('content')
    <h2>Form Todo</h2>

    @include('share.validation')

    {{ Form::open(['url'=>'todo','files'=>'true'])}}
    @include('todo.form')
    {{ Form::submit('Save Todo')}}
    {{ link_to('/todo','Back')}}
    {{ Form::close() }}

@endsection()