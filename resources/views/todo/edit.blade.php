@extends('layout')
@section('title','Form todo')
@section('content')
    <h2>Form Todo</h2>

    @include('share.validation')

    {{ Form::model($todo,['url'=>'todo/'.$todo->id,'method'=>'put'])}}
    @include('todo.form')
    {{ Form::submit('Update Todo')}}
    {{ link_to('/todo','Back')}}
    {{ Form::close() }}

@endsection()