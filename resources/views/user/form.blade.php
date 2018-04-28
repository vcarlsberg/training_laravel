<div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
            {{ Form::text('name',null,['placeholder'=>'Todo Title','class'=>'form-control'])}}
            </div>
    </div>       

    <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
            {{ Form::email('email',null,['placeholder'=>'Todo Title','class'=>'form-control'])}}
            </div>
    </div>  

    <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
            {{ Form::password('password',['placeholder'=>'Todo Title','class'=>'form-control'])}}
            </div>
    </div>  