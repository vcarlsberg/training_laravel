<?php
//print_r($todos);
?>

<table border="1">
<tr>
<td>Title</td>
<td>Description</td>
<td>Category</td>
</tr>

@foreach($todos as $todo)

    <tr>
    <td>{{ $todo->title}}</td>
    <td>{{ $todo->description}}</td>
    <td>{{ $todo->category->name}}</td>
    </tr>
@endforeach
</table>

