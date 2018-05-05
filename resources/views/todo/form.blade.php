{{ Form::text('title',null,['placeholder'=>'Todo Title'])}}
<br>
{{ Form::select('category',[1=>'Urgent',2=>'Normal',3=>'Slow'],null)}}
<br>
{{ Form::textarea('description',null)}}
<br>
{{Form::file('images')}}