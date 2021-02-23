@extends('welcome')

@section('content')
<h2>Update View</h2>
<form action="/update" method="get">
    <label for="">Product Name</label>
    <input type="text" name="PName" value="{{$PName}}">
<br>
<label for="">Product Price</label>
    <input type="text" name="PPrice" value="{{$PPrice}}">
    <input type="hidden" name="PID" value="{{$PID}}">
<br>
<input type="submit" value="submit">
</form>
@endsection
