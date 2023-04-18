@extends('layouts.app')
@section('content')

<style>
    
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 100%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;        
    float: right;
}
.search-box input {
    height: 34px;
    border-radius: 20px;
    padding-left: 35px;
    border-color: #ddd;
    box-shadow: none;
}
.search-box input:focus {
    border-color: #3FBAE4;
}
.search-box i {
    color: #a0a5b1;
    position: absolute;
    font-size: 19px;
    top: 8px;
    left: 10px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}    
</style>



<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Customer <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Surname<i class="fa fa-sort"></i></th>
                        <th>Email <i class="fa fa-sort"></i></th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user )
    

                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->email}}</td>
                       
                        <td>
                            <a href="#"  class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="#" data-toggle="modal" data-target="#exampleModal" data-id="{{ $user->id }}" class="edit-btn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="#" data-toggle="modal" data-target="#delete"   data-id="{{ $user->id }}" class="edit-btn"><i class="material-icons" style='color:red'>&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
                   
            </table>
            <div class="d-flex justify-content-left">
                    {!! $users->links() !!}
                </div>
              
</div>   
    


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="signup-form">
                <form action="{{'/register'}}" method="post" id="updateForm">
                    @csrf
                    @method('PUT')

                    <h2>Edit Account</h2>
                    
                   <input type="hidden" name="id" id="id" value="{{$user->id}}" data-id="{{ $user->id }}">
                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required="required">
                        @error('first_name')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required="required">
                                @error('last_name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                    </div>
                   
                         
                    
                    <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update changes</button>
        </div>
                </form>
               
            </div>
        </div>
        
      </div>
    </div>
  </div>

  

  <!-- Modal  delete-->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-dark">
            
                @csrf
                @method('delete')
                
            You are about to delete 
             <input type="hidden" name="id" id="id" value="{{$user->id}}" data-id="{{ $user->id }}">
                   <label  class="text-danger" for=""> {{$user->name}}  {{$user->surname}}</label>
        
            </div>
        
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
          <button type="submit"  class="btn-delete btn btn-primary">Delete</button>
        </div>
      </div>
    </div>
  </div>
@endsection