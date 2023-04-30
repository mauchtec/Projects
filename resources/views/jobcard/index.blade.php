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

        
    body {
        
        font-family: 'Roboto', sans-serif;
    }
    .form-control {
        height: 40px;
        box-shadow: none;
        color: #969fa4;
    }
    .form-control:focus {
        border-color: #5cb85c;
    }
    .form-control, .btn {        
        border-radius: 3px;
    }
    .signup-form {
        width: 450px;
        margin: 0 auto;
        padding: 30px 0;
          font-size: 15px;
    }
    .signup-form h2 {
        color: #636363;
        margin: 0 0 15px;
        position: relative;
        text-align: center;
    }
    .signup-form h2:before, .signup-form h2:after {
        content: "";
        height: 2px;
        width: 30%;
        background: #d4d4d4;
        position: absolute;
        top: 50%;
        z-index: 2;
    }	
    .signup-form h2:before {
        left: 0;
    }
    .signup-form h2:after {
        right: 0;
    }
    .signup-form .hint-text {
        color: #999;
        margin-bottom: 30px;
        text-align: center;
    }
    .signup-form form {
        color: #999;
        border-radius: 3px;
        margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .signup-form .form-group {
        margin-bottom: 20px;
    }
    .signup-form input[type="checkbox"] {
        margin-top: 3px;
    }
    .signup-form .btn {        
        font-size: 16px;
        font-weight: bold;		
        min-width: 140px;
        outline: none !important;
    }
    .signup-form .row div:first-child {
        padding-right: 10px;
    }
    .signup-form .row div:last-child {
        padding-left: 10px;
    }    	
    .signup-form a {
        color: #fff;
        text-decoration: underline;
    }
    .signup-form a:hover {
        text-decoration: none;
    }
    .signup-form form a {
        color: #5cb85c;
        text-decoration: none;
    }	
    .signup-form form a:hover {
        text-decoration: underline;
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
						
						<a href="#addEmployeeModal" class="btn btn-success location " data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>New Jobcard</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
						<div class="search-box   ">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" name="searchsite" id="searchsite"  class="form-control" placeholder="Search&hellip;">
                        </div>
					</div>
				</div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Technician <i class="fa fa-sort"></i></th>
                        <th>Client</th>
                        <th>Email <i class="fa fa-sort"></i></th>
                        <th>Number</th>
                        <th>Site Name <i class="fa fa-sort"></i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                

                   
                    @foreach ($jobs as $job ) 
                       <tr>
                        <td>{{$job->id}}</td>
                        <td>{{$job->tachname}}</td>
                        <td>{{$job->clientname}}</td>
                        <td>{{$job->clientemail}}</td>
                        <td>{{$job->clientnumber}}</td>
                        <td>{{$job->sitename}}</td> 
                        <td>
                            <a href="#" class="send" title="send" data-toggle="tooltip"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                            <a href="/jobcard/{{$job->id}}" target="_blank" class="edit" title="pdf" data-toggle="tooltip"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
               
                           
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link"><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>  
</div>   
    
  <!------------->
  <div class="signup-form">
    <div class="card-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success  alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">×</button>  
                <strong>{{ $message }}</strong>
            </div>
        @endif
        
   </div>
 


<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ route('jobcard.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">	
                    				
					<h4 class="modal-title">JobCard</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
                    
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signatureModal">Sign Here</button>
                    </div>
                
                <div class="modal fade" id="signatureModal" tabindex="-1" role="dialog" aria-labelledby="signatureModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="signatureModalLabel">Sign Here</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <canvas id="signature-pad"></canvas>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary " data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary getElementById " id="saveSignature">Save</button>
                        </div>
                    </div>
                    </div>
                </div>
				<div class="modal-body">					
                    
                
                       
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col"><input type="text" class="form-control input-sm" name="clientname" placeholder="Client Name" ></div>
                                @error('clientname')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>        	
                        </div>
                        
                        <div class="form-group">
                            <input type="tel" class="form-control input-sm" name="phone" id="phone" placeholder="27656231093">
                            @error('phone')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control input-sm" name="email" placeholder="Client Email" >
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="browser" class="form-label">Choose a site from the list:</label>
                            <input class="form-control" list="sitename" name="sitename" id="fruit">
                            <datalist id="sitename">
                                @foreach ($browsers as $browser)
                               
                                <option value="{{ $browser }}">{{ $browser }}</option>
                               
                            @endforeach
                           
                            </datalist>
                            @error('sitename')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="appt">Start Time</label><input type="time" id="start" name="start">
                            <label for="appt">End Time</label><input type="time" id="end" name="end">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="trust" id="trust">
                            <label for="description">Fault Report <span class="text-danger">rememmber to put (.) on every line</span></label>
                            
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control input-sm"></textarea>
                        </div> 
                       
                                    
                       
                          
                        
                      
                    
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" id="gg">Save</button>
                        </div>
                    
                    
			</form>
		</div>
	</div>
</div>
  <script>
    
    $('#signatureModal').on('shown.bs.modal', function() {
      var canvas = document.getElementById('signature-pad');
      var signaturePad = new SignaturePad(canvas);
    });

    $('#signatureModal').on('shown.bs.modal', function() {
var canvas = document.getElementById('signature-pad');
var signaturePad = new SignaturePad(canvas);
$('#saveSignature').on('click', function() {
  var dataURL = signaturePad.toDataURL();

  console.log(dataURL);
  $('#trust').val(dataURL);
  $('#signatureModal').modal('hide');
  var modal = document.getElementById("signatureModal");
var closeBtn = document.getElementsByClassName("saveSignature")[0];

modal.style.display = "none";
});
});


  </script>
        

    
@endsection








