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
.table-container {
  width: 50%;
  margin: 0 auto; /* Center the table */
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
	img{
		width: 180px;
    height: 100px;
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
@if(session('success'))
  <div class="alert alert-success messages">
    {{ session('success') }}
  </div>
@endif
<div id="messages" class="text-dark"></div>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-4">
						<h2>Manage <b>Sims</b></h2>
					</div>
					
					<div class="col-sm-8  form-switch">
						
						<a href="#addSimcard" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Simcard</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
						
							<input class="form-check-input" type="checkbox" user-id="{{auth()->id()}}" role="switch" id="flexSwitchCheckDefault">
							<label class="form-check-label" for="flexSwitchCheckDefault">Get your sims</label>
						  
						<div class="search-box ">
							
								
							  
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
					</div>
					
				</div>
			</div>


			<div class="row">
				<div class="col">
					<table class=" table-container table table-striped table-hover table-bordered table-sm table-responsive" id="simstable">
						<thead>
							<tr>
								
								<th>Serial <i class="fa fa-sort"></i></th>
								<th>Site-Name <i class="fa fa-sort"></i></th>
								<th>Purpose </th>
								<th>Status </th>						
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($images as $image)
							<tr>
								<td>{{$image->Serial}}</td>
								@if ($image->sitename)
								
								<td>{{$image->sitename}}</td>
								@else
								<td>New Sim</td>
								@endif
								<td class="bg-info text-white">{{$image->Purpose}}</td>
								@if ($image->active)
								<td class="bg-success text-white">used on site</td>
								@else
								<td class="bg-danger text-white">in-stock</td>
								@endif
								<td>
									<a href="#" data-toggle="modal" data-target="#ViewSim"  data-id="{{$image->id}}"class="viewsim-btn"><i class="material-icons">&#xE417;</i></a>
									<a href="#" data-toggle="modal" data-target="#EditSimcard" data-id="{{$image->id}}" class="editsim-btn" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
									<a href="#" data-toggle="modal" data-target="#deletesim"   sim-id="{{$image->id}}" class="del-btn delsim-btn"><i class="material-icons" style='color:red'>&#xE872;</i></a>
								</td>
							</tr>
							@endforeach
						   
						</tbody>
						   
					</table>
				</div>
				
			</div>
			
            



			
			






<!-- Add new sim Modal HTML -->
<div id="addSimcard" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" action="{{'/sims'}}" enctype="multipart/form-data">

				@csrf
				<div class="modal-header">						
					<h4 class="modal-title text-dark">Add Sim</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"  onClick="closecam();">&times;</button>
				</div>
				<div class="modal-body">	
					
					<div class=" form-group row" style=".row {
						display: flex;
					  }">
						<div class="col-md-6 col-sm-6">
							
							<input type="file" name="imaged" id="myFileInput" accept="image/;capture=camera">
							
							<input type="hidden" name="image" class="image-tag" style="width:100%" >
						</div>
						<div class="col-md-6 col-sm-6" id="results">
							<img id="myImage" width="200" height="200">
						</div>

						
					</div>
					<div class="form-group">
						<label>Sim Serial</label>
						<input type="number" name="serial" id="serial" class="form-control" required>
					</div>
								
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" onClick="closecam();" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="EditSimcard" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content ">
			<form action="" method="put" id="updatesim" class="updatesim">
				<input type="hidden" name="id" id="id" >
				<div class="modal-header">						
					<h4 class="modal-title text-dark ">Edit Simcard</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body text-dark">					
					<div class="form-group" id="image-container">
						<input type="image" id="sim"  name="sim" src="" alt="" >
						
					</div>
					<div class="form-group">
						<label>Serial Number</label>
						<input type="number" id="simserial" name="simserial" class="form-control" >
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col">
									<select name="purpose" id="purpose" class="form-select form-control" onchange="addscannernumber()" required>
									<option selected >Select Purpose</option>
									<option value="dongle">Dongle</option>
									<option value="signal">Signal</option>
									<option value="gatemagic">Gatemagic</option>
									<option value="scanner">Scanner</option>
									<option value="other">Other</option>
								</select>
							</div>
							<div class="col">
								<div id="myinst" style="display:none;">
									<input type="number" name="scannernum" id="scannernum" class="form-control" placeholder="Scanner Number" >
								</div>
							</div>
						</div>
						
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col form-check form-switch">
								
									<input type="checkbox" id="mySwitch" name="status" value="1" checked required>
									<label  for="mySwitch">Activate</label>
								 
								
							</div>
							<div class="col">
								
									
								
							</div>
						</div>
						
					</div>

					<div class="form-group">
						<select  name="sitenames" id="sitenames" class="form-select form-control" >
							<option selected >Choose a site</option>
						</select>
						
					</div>
									
				</div>
				<div class="modal-footer" >
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- ViewSim Modal HTML -->
<div id="ViewSim" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content text-dark">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Sim information</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body " id="man">
					<form action="" id="man">
					<div class="row ">
						<div class="col col-5" id="image-contain">
							
								<input type="image" id="sims"  name="sims" src="" alt="" width="200" height="200">
														
						</div>
						<div class="col col-7" id="simserial">
							<label id="site" for=""></label><br>
							<label id="simser" for=""></label><br>
							<label id="purposed" for=""></label><br>
							
						</div>
						
					</div>					
				</form>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					
				</div>
			</form>
		</div>
	</div>
</div>




<div id="deletesim" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content text-dark">
			<form method="" action=""  id="delete-sim">
				@method('DELETE')
				@csrf
				<div class="modal-header">						
					<h4 class="modal-title">Delete Sim Card</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p id="simserial" class="simserial">Are you sure you want to delete Sim</p>
					<input type="hidden" name="delid" id="delid">
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default " data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger deletesimcard" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>

<script language="JavaScript">
function addscannernumber(){


	var v=document.getElementById("purpose");
          var v1=document.getElementById("myinst");
	console.log(v.value);
		  if(v.value=="scanner")
          {
             v1.style.display='block';
          }
          else
          {
             v1.style.display='none';
          }
        
}

const fileInput = document.getElementById('myFileInput');
const img = document.getElementById('myImage');

fileInput.addEventListener('change', function(event) {
  const file = event.target.files[0];
  const url = URL.createObjectURL(file);
  img.src = url;
});

	</script>
@endsection