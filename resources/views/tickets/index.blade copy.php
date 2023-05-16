@extends('layouts.app')
@section('content')
<style>
    #div1, #div2,#div3 {
        width: 30%;
      height: auto;
     
      margin: 10px;
      padding: 10px;
      display: inline-block;
      vertical-align: top;


  float: left;
  
  border: 1px solid black;
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
.column {
      width: 30%;
      height: auto;
     
      margin: 10px;
      padding: 10px;
      display: inline-block;
      vertical-align: top;
    }
    #column1 {
    
      background-color: rgb(255, 4, 4);
      
    }
    #column2 {
     
      background-color: rgb(14, 146, 14);
     
    }
    #column3 {
     
      background-color: rgb(53, 50, 226);
     
    }

    .item {
      width: 90%;
      height: 50px;
      background-color: rgb(0, 0, 0);
      color: white;
      text-align: center;
      line-height: 50px;
      margin: 5px auto;
      cursor: move;
    }

    .active {
      border: dashed 2px red;
    }
    body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
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
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
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
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}

/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
  </style>
    
    <div class="container-xl text-sm">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-3 ">
                            <h2>Manage <b>Tickets</b></h2>
                            
                        </div>
                        <div class="col-sm-5 ">
                            <label for="sitename">Choose a Site:</label>
                            <input list="sitename" >
                                
                                <datalist id="sitename">
                                    @foreach ($Sitenames as $sitename )
                                    <option value="{{$sitename}}">
                                    @endforeach
                                    
                                </datalist>
                               
                               
                                
                        </div>
                        
                        <div class="col-sm-4 form-check form-switch ">
                                <input class="form-check-input" type="checkbox" role="switch" id="userticket" name="userticket" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">User Tickets:</label>
                             
                           
                            <a href="#addTicketModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Ticket</span></a>
                                </div>
                    </div>

                    
                </div>
                <div class="column" id="column1" ondragover="allowDrop(event)" ondrop="drop(event)">
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="badge bg-dark">Open</span>
                      </div>
                    <div class="item" id="item1" draggable="true" ondragstart="drag(event)">Item 1</div>
                    <div class="item" id="item2" draggable="true" ondragstart="drag(event)">Item 2</div>
                  </div>
                  <div class="column" id="column2" ondragover="allowDrop(event)" ondrop="drop(event)">
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="badge bg-primary">Pending</span>
                      </div>
                   
                    <div class="item"  id="item3" draggable="true" ondragstart="drag(event)">Item 3</div>
                    <div class="item" id="item4" draggable="true" ondragstart="drag(event)">Item 4</div>
                  </div>
                  <div class="column" id="column3" ondragover="allowDrop(event)" ondrop="drop(event)">
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="badge bg-success">Resolved</span>
                      </div>
                    
                    <div class="item" id="item5" draggable="true" ondragstart="drag(event)">Item 5</div>
                    <div class="item" id="item6" draggable="true" ondragstart="drag(event)">Item 6</div>
                  </div>
                  <hr>


                  <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                    <img src="img_w3slogo.gif" draggable="true" ondragstart="drag(event)" id="drag1" width="88" height="31">
                    <img src="img_w3slogo.gif" draggable="true" ondragstart="drag(event)" id="drag1" width="88" height="31">
                    <div class="item"  id="item3" draggable="true" ondragstart="drag(event)">Item 3</div>
                    <div class="item" id="item4" draggable="true" ondragstart="drag(event)">Item 4</div> 
                </div>
                  <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                  <div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
            </div>
       
   
    </div>
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Site <b>Tickets</b></h2></div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered table-sm ">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name <i class="fa fa-sort"></i></th>
                            <th>Address</th>
                            <th>City <i class="fa fa-sort"></i></th>
                            <th>Pin Code</th>
                            <th>Country <i class="fa fa-sort"></i></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Thomas Hardy</td>
                            <td>89 Chiaroscuro Rd.</td>
                            <td>Portland</td>
                            <td>97219</td>
                            <td>USA</td>
                            <td>
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Maria Anders</td>
                            <td>Obere Str. 57</td>
                            <td>Berlin</td>
                            <td>12209</td>
                            <td>Germany</td>
                            <td>
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Fran Wilson</td>
                            <td>C/ Araquil, 67</td>
                            <td>Madrid</td>
                            <td>28023</td>
                            <td>Spain</td>
                            <td>
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Dominique Perrier</td>
                            <td>25, rue Lauriston</td>
                            <td>Paris</td>
                            <td>75016</td>
                            <td>France</td>
                            <td>
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Martin Blank</td>
                            <td>Via Monte Bianco 34</td>
                            <td>Turin</td>
                            <td>10100</td>
                            <td>Italy</td>
                            <td>
                                <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>        
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
    
               
   
<!-- Add New ticket Modal HTML -->
<div id="addTicketModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">New Ticket</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Site Name</label>
						<input list="fruits" class="form-control">
                                
                                <datalist id="fruits">
                                    @foreach ($Sitenames as $sitename )
                                    <option value="{{$sitename}}">
                                    @endforeach
                                    
                                </datalist>
					</div>
					
					<div class="form-group">
						<div class="row">
                            <div class="col">
                                
                                <select name="priority" id="priority" class="form-control" required>
                                    <option value="" selected>Select Priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                            <div class="col">
                                <select name="status" id="status" class="form-control" required>
                                    <option value="" selected>Choose Status</option>
                                    <option value="Open">Open</option>
                                    <option value="Pending">Pending</option>
                                    <option value="closed">closed</option>
        
                                </select>
                            </div>
                        </div>
						
					</div>
                    <div class="form-group">
						
						<select name="technician" id="technician" class="form-control" required>
                            <option value="" selected>Assign Technician</option>
                            <option value="Trust">Trust</option>
                            <option value="Zeyn">Zeyn</option>
                            <option value="Tyreke">Tyreke</option>
                            <option value="Abel">Abel</option>

                        </select>
					</div>
					<div class="form-group">
						<label for="description">Problem description:</label>
						<textarea name="description" id="description"  rows="4" required class="form-control"></textarea>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>



  


<script>



function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}

function allowTouchDrop(ev) {
  ev.preventDefault();
}

function touchStart(ev) {
  ev.preventDefault();
  var touch = ev.touches[0];
  ev.dataTransfer.setData("text", touch.target.id);
}

function touchEnd(ev) {
  ev.preventDefault();
}

function touchMove(ev) {
  ev.preventDefault();
  var touch = ev.touches[0];
  var data = ev.dataTransfer.getData("text");
  var target = document.getElementById(data);
  target.style.position = "absolute";
  target.style.left = touch.pageX + "px";
  target.style.top = touch.pageY + "px";
}

/////////////////////////////////////////////
    let draggedItem = null;

    function allowDrop(event) {
        event.preventDefault();
        event.currentTarget.classList.add('active');
    }

    function drop(event) {
        event.preventDefault();
        event.currentTarget.classList.remove('active');
        event.currentTarget.appendChild(draggedItem);
    }

    function drag(event) {
        draggedItem = event.target;
    }

    function touchStart(event) {
        draggedItem = event.target;
        event.preventDefault();
    }

    function touchMove(event) {
        event.preventDefault();
        draggedItem.style.left = event.touches[0].clientX - draggedItem.offsetWidth / 2 + 'px';
        draggedItem.style.top = event.touches[0].clientY - draggedItem.offsetHeight / 2 + 'px';
    }

    function touchEnd(event) {
        event.preventDefault();
        const dropZone = document.elementFromPoint(event.changedTouches[0].clientX, event.changedTouches[0].clientY);
        if (dropZone && dropZone.classList.contains('column')) {
            dropZone.appendChild(draggedItem);
        }
        draggedItem.style.left = '';
        draggedItem.style.top = '';
        draggedItem = null;
    }
</script>
    
@endsection