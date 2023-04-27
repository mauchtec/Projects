

<form action="{{secure_url('done')}}" method="post" enctype="multipart/form-data">
  @csrf
<input type="file" name="sql_file" id="sql_file">

<button type="submit">Upload</button>
</form>
