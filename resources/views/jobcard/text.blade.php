@extends('layouts.app')
@section('content')
<meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


<form action="{{route('done')}}" method="post" enctype="multipart/form-data">
  @csrf
<input type="file" name="sql_file" id="sql_file">

<button type="submit">Upload</button>
</form>
@endsection