@extends('layout')
@section('title','List Todo')
@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Bordered Table</h3>
        </div>
        <div class="box-body">
        {{ Session ('message') }}
            <table class="table table-bordered">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created at</th>
                    <th width="135"></th>
                </tr>
                @foreach($todos as $todo)
                    <tr>
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description}}</td>
                        <td>{{ $todo->created_at}}</td>
                        <td>
                        {{ link_to('todo/'.$todo->id.'/edit','Edit',['class'=>'btn btn-info'])}}
                        {{Form::open(['url'=>'todo/'.$todo->id,'method'=>'delete','style'=>'float:right','onClick'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])}}
                        {{Form::submit('delete',['class'=>'btn btn-success'])}}
                        {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
            </table>
            <hr>
            <a href="/todo/create" class="btn btn-danger btn-sm">Create New Todo</a>
        </div>
</div>



    
@endsection()