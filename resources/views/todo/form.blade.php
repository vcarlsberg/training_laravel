{{ Form::text('title',null,['placeholder'=>'Todo Title'])}}
<br>
{{ Form::select('category',$categories,null)}}
<br>
{{ Form::textarea('description',null)}}
<br>
{{Form::file('images')}}