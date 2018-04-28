@extends('layout')
@section('title','Form todo')
@section('content')
    <h2>Form Todo</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{ Form::open(['url'=>'todo'])}}
    {{ Form::text('title',null,['placeholder'=>'Todo Title'])}}
    <br>
    {{ Form::select('category',[1=>'Urgent',2=>'Normal',3=>'Slow'],null)}}
    <br>
    {{ Form::textarea('description',null)}}
        <br>
    {{ Form::submit('Save Todo')}}
    {{ link_to('/todo','Back')}}
    {{ Form::close() }}

@endsection()