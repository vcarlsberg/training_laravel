@extends('layout')
@section('title','List User')
@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Bordered Table</h3>
        </div>
        <div class="box-body">
        {{ Session ('message') }}
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <th>{{ link_to('user/'.$user->id.'/edit','Edit',['class'=>'btn btn-info'])}}</th>
                        <th>
                        {{Form::open(['url'=>'user/'.$user->id,'method'=>'delete','style'=>'float:right','onClick'=>"return confirm('Apakah anda yakin akan menghapus data ini?');"])}}
                        {{Form::submit('delete',['class'=>'btn btn-success'])}}
                        {{Form::close()}}
                        </th>
                    </tr>
                @endforeach
            </table>
            <hr>
            <a href="/user/create" class="btn btn-danger btn-sm">Create New User</a>
        </div>
</div>



    
@endsection()