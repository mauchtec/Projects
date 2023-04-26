@extends('layouts.app')
@section('content')
<style>

    
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
						<h2>Manage <b>Sites</b></h2>
					</div>
					<div class="col-sm-6">
						
						<a href="#addsite" class="btn btn-success location " data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Site</span></a>
						<div class="d-flex justify-content-end mb-4">
                            <a class="btn btn-primary" href="{{ URL::to('/done') }}">Export to PDF</a>
                        </div>
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" name="searchsite" id="searchsite"  class="form-control" placeholder="Search&hellip;">
                        </div>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover table-bordered table-sm table-responsive" id="sitestable">
				<thead>
					
						<th>Site-Name <i class="fa fa-sort"></i></th>
						<th>Address<i class="fa fa-sort"></i></th>
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

    
@endsection