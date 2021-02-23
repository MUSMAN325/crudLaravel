@extends('welcome')

@section('content')
<h2>Randome View</h2>
<form action="/insertdata" method="post" enctype="multipart/form-data">
@csrf
    <label for="">Product Name</label>
    <input type="text" name="PName">
<br>
<label for="">Product Price</label>
    <input type="text" name="PPrice">
<br>
<label for="">Product Image</label>
    <input type="file" name="image">
<br>
    <input type="submit" value="submit">
</form>
<br>
<br>
<br>
<table class="table">
    <thead>
        <th>ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Image</th>
        <th>Update</th>
        <th>Delete</th>
    </thead>
    <tbody>
@foreach ($data as $item)
<tr>
<form action="/updateordelete" method="get">
<td> <input type="hidden" name="ID" value="{{$item['id']}}"> {{$item['id']}}</td>
<td> <input type="hidden" name="PName" value="{{$item['PName']}}"> {{$item['PName']}}</td>
<td> <input type="hidden" name="PPrice" value="{{$item['PPrice']}}"> {{$item['PPrice']}}</td>
<td><img src="images/{{$item['image']}}" width="100px" height="100px"></td>
<td><input type="submit" name="update" value="update"></td>
<td><input type="submit" name="delete" value="delete"></td>
</form>
</tr>
@endforeach
    </tbody>

</table>
@endsection
