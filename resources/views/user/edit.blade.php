@extends('layout')
@section('title','Form todo')
@section('content')
<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Bordered Table</h3>
        </div>
        <div class="box-body">

    @include('share.user_validation')   

    {{ Form::model($user,['url'=>'user/'.$user->id,'class'=>'form-horizontal','method'=>'put'])}}
    @include('user.form')

    <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                    {{ Form::submit('Save User',['class'=>'btn btn-success'])}}
                    {{ link_to('/user','Back',['class'=>'btn btn-info'])}}

            </div>
    </div>  
    
    

    {{ Form::close() }}
        </div>
</div>
@endsection()