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
        font-size: 15px;
        padding-bottom: 10px;
        margin: 0 0 10px;
        min-height: 45px;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    .table-title select {
        border-color: #ddd;
        border-width: 0 0 1px 0;
        padding: 3px 10px 3px 5px;
        margin: 0 5px;
    }
    .table-title .show-entries {
        margin-top: 7px;
    }
    .search-box {
        position: relative;
        float: right;
    }
    .search-box .input-group {
        min-width: 200px;
        position: absolute;
        right: 0;
    }
    .search-box .input-group-addon, .search-box input {
        border-color: #ddd;
        border-radius: 0;
    }
    .search-box .input-group-addon {
        border: none;
        border: none;
        background: transparent;
        position: absolute;
        z-index: 9;
    }
    .search-box input {
        height: 34px;
        padding-left: 28px;		
        box-shadow: none !important;
        border-width: 0 0 1px 0;
    }
    .search-box input:focus {
        border-color: #3FBAE4;
    }
    .search-box i {
        color: #a0a5b1;
        font-size: 19px;
        position: relative;
        top: 8px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
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
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        padding: 0 10px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 30px !important;
        text-align: center;
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
        margin-top: 10px;
        font-size: 13px;
    }
</style>


@php
  $colorClasses = [ 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info','bg-primary',];
@endphp


  

  <div class="container-xl">
    <div class="row pt-3">
        @foreach ($userTotals as $index => $user)
        @php
          $randomColorClass = $colorClasses[$index % count($colorClasses)];
        @endphp
        <div class="col-md-4">
          <div class="card {{ $randomColorClass }}">
            <div class="card-body">
              <h2 class="card-title text-dark">{{ $user->name }}&nbsp; {{ $user->surname }}</h2>
              
              <h6 class="card-subtitle mb-2 text-dark">Disctance: km{{ $user->km }}</h6>
              <p class="card-text text-dark">Total Amount: R{{ $user->totalAmount }}</p>
              <a class="text-white" href="{{ route('excel', ['id' => $user->id]) }}">Export<i class="fa fa-file-excel-o fa-3x " aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      @endforeach
      
      </div>
    <div class="table-responsive">
        <div class="table-wrapper">			
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="show-entries">
                            <span>Show</span>
                            <select>
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                            </select>
                            <span>entries</span>
                        </div>						
                    </div>
                    <div class="col-sm-4">
                        <h2 class="text-center text-dark"><b>All Travel  And Purchase Logs</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        
                        <th>{{ $Month }} <i class="fa fa-sort"></i></th>
                        <th>From</th>
                        <th>Destination <i class="fa fa-sort"></i></th>
                        <th>Type</th>
                        <th>Km</th>
                        <th>Cost <i class="fa fa-sort"></i></th>
                        <th>Resason</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $record )
                        
                     <tr>
                        <td> {{$record->dates}} </td>
                        <td> {{$record->from_place}} </td>
                        <td>{{$record->to_place}}</td>
                        <td>{{$record->transaction_type}}</td>
                        <td>{{$record->kms}}</td>
                        <td>{{$record->amount}}</td>
                        <td>{{$record->reason}}</td>
                        <td>
                            <a href="#" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endforeach
                           
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>        
</div>    
@endsection