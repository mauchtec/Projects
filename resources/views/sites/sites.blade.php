@extends('layouts.app')

@section('content')

<style>
    
	.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
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



.search-box {
    position: relative;        
    float: right;
	padding-left: 5px;
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
	padding-left: 5px;
}
</style>

<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Employees</b></h2>
					</div>
					<div class="col-sm-6">
						<div class="search-box   ">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" name="searchsite" id="searchsite"  class="form-control" placeholder="Search&hellip;">
                        </div>
						<a href="#addsite" class="btn btn-success location " data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Site</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover table-bordered table-sm table-responsive" id="sitestable">
				<thead>
					
						<th>Site-Name</th>
						<th>Address</th>
						<th>Email</th>
						<th>Phone/WhatsApp</th>
						<th>Co-Ordinates</th>
						<th>Site-URL</th>
						<th >Actions    </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($sites as $site)
					
	


					<tr>
						
						<td>{{$site->sitename }}</td>
							<td>{{$site->siteaddress}}</td>
							<td > <a href="mailto:{{$site->email}}"><i class="fa fa-envelope" aria-hidden="true"></i></a> </td>
					
						<td> 
							<a href="tel:+27{{$site->sitenumber }}"><i class="fa fa-phone" aria-hidden="true"></i></a>
							<a href="https://api.whatsapp.com/send?phone=27{{$site->sitenumber }}"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
						</td>
						<td>  <a href="https://www.google.com/search?q={{$site->coodinates }}"><i class="fa fa-map-marker" aria-hidden="true"></i></i></a> </td>
						<td> <a href="{{$site->link }}"><i class="fa fa-link" aria-hidden="true"></i></a> </td>
						<td>
							<a href="#"  class="view" title="View" data-toggle="modal" data-target="#exampleModal" site-id="{{ $site->id }}"><i class="material-icons">&#xE417;</i></a>
							<a href="#" data-toggle="modal" data-target="#editsite" site-id="{{ $site->id }}" class="editsite" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
						</td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
			<div class="d-flex justify-content-left">
				{{!! $sites->links() !!}}
			</div>
<!-- Create Modal HTML -->
<div id="addsite" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content text-dark">
			<form method="post" action="{{'/sites'}}">
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title text-dark">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->name}}">
						<input type="text"  class="form-control" name="sitename" id="sitename" required placeholder="Enter site name">
						
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col">
								<input type="text" class="form-control" name="contactperson" id="contactperson" required placeholder="contact person">
				
							</div>
							<div class="col">
								<input type="tel" class="form-control" name="sitenumber" id="sitenumber" required placeholder="Enter site phone number">
				
							</div>
						</div>
					</div>
					<div class="form-group">
						
								<input type="text" class="form-control" name="coodinates" id="coodinates" required placeholder="Enter co-odinates">
				
					</div>
					<div class="form-group">
						
						<input type="email" class="form-control" name="email" id="email" required placeholder="Enter site email address">
					</div>
					<div class="form-group">
						
						<input type="address" class="form-control" name="address" id="address" required placeholder="Enter site address">
					</div>
					<div class="form-group">
						<div class="form-group">
						
							<input type="url" class="form-control" name="link" id="link" required placeholder="Enter site URl">
						</div>
						</div>
					<div class="form-group">
						
						<textarea class="form-control" name="notes" id="notes" required></textarea >
					</div>
										
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success btn-create" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editsite" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content text-dark">
			
			<form method="post" action=""  id="updatesite" class="updatesite">
					@csrf
                    @method('PUT')
				<div class="modal-header">						
					<h4 class="modal-title text-dark">Edit Site Details</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<input type="hidden" name="site_id" id="site_id" >
						<input type="text"  class="form-control" name="sitenames" id="sitenames" required placeholder="Enter site name">
						
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col">
								<input type="text" class="form-control" name="contactpersons" id="contactpersons" required placeholder="contact person">
				
							</div>
							<div class="col">
								<input type="tel" class="form-control" name="sitenumbers" id="sitenumbers" required placeholder="Enter site phone number">
				
							</div>
						</div>
					</div>
					<div class="form-group">
						
								<input type="text" class="form-control" name="coodinate" id="coodinate" required placeholder="Enter co-odinates">
				
					</div>
					<div class="form-group">
						
						<input type="email" class="form-control" name="emails" id="emails" required placeholder="Enter site email address">
					</div>
					<div class="form-group">
						
						<input type="address" class="form-control" name="addres" id="addres" required placeholder="Enter site address">
					</div>
					<div class="form-group">
						
						<input type="url" class="form-control" name="links" id="links" required placeholder="Enter site URL">
					</div>
					<div class="form-group">
						
						</div>
					<div class="form-group">
						
						<textarea class="form-control" name="note" id="note" required></textarea >
					</div>
										
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success " value="update">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<input type="hidden" name="siteid" id="siteid" value="{{Auth::user()->name}}" data-id="{{ Auth::user()->name}}">
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger deletesite" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
    



 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title text-dark"" id="exampleModalLabel"><i class="fa fa-home fa-fw" aria-hidden="true"></i></h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body text-dark">

			<div class="modal-body">					
				<div class="input-container">
					<i class="fa fa-user a-fw fa-2x" aria-hidden="true"></i>
					<input type="text"  class="form-control" name="site" id="site" readonly>
					
				</div>
				
				
				<div class="input-container">
					<i class="fa fa-user a-fw fa-2x" aria-hidden="true"></i>
					<input type="text" class="form-control" name="contact" id="contact" readonly>
				</div>
				<div class="input-container">
					<i class="fa fa-map-marker a-fw fa-2x" aria-hidden="true"></i>
					<input type="tel" class="form-control" name="number" id="number" readonly>
				</div>
				<div class="input-container">
					<i class="fa fa-map-marker a-fw fa-2x" aria-hidden="true"></i>
					<input type="text" class="form-control" name="coodinated" id="coodinated" readonly>
			
				</div>
				<div class="input-container">
					<i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
					<input type="email" class="form-control" name="mail" id="mail" readonly>
				</div>
				<div class="input-container">
					<i class="fa fa-home  fa-2x" aria-hidden="true"></i>
					<input type="address" class="form-control" name="addr" id="addr" readonly>
				</div>
				<div class=" input-container">					
					<i class="fa fa-link fa-2x" aria-hidden="true"></i>
						<input type="url" class="form-control" name="linked" id="linked" readonly>					
					</div>

					
				<div class="input-container">
					<i class="fa fa-sticky-note a-fw fa-2x" aria-hidden="true"></i>
					<textarea class="form-control" name="noted" id="noted" readonly></textarea >
				</div>
									
			</div>


			
		  ...
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  
		</div>
	  </div>
	</div>
  </div>
@endsection