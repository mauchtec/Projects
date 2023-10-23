@extends('layouts.app')
@section('content')
<style>
    .map-view .icon {
        height: 30px;
        width: 30px;
    }
    .map-view .tt-icon.-finish {
        height: 16px;
        width: 16px;
    }
    .map-view .icon-spacing {
        margin-right: 14px;
        margin-top: 24px;
    }
    .map-view .searchbox {
        flex: 1;
    }
    .map-view .searchbox-wrapper {
        display: flex;
        min-height: 52px;
    }
    .map-view .draggable-marker {
        align-items: center;
        background-color: #4a90e2;
        border: solid 3px #2faaff;
        border-radius: 50%;
        display: flex;
        height: 32px;
        justify-content: center;
        transition: width .1s, height .1s;
        width: 32px;
    }
    .summary-header {
        border-bottom: 1px solid #f2f2f2;
        font-size: 16px;
        font-weight: bold;
        padding: 24px;
    }
    .summary-details-top {
        font-size: 16px;
        font-weight: bold;
        padding: 24px 24px 0;
    }
    .summary-details-bottom {
        display: flex;
    }
    .summary-icon-wrapper {
        padding: 24px;
        width: 98px;
    }
    .summary-details-text {
        padding: 24px 24px 24px 0;
        width: calc(100% - 98px);
    }
    .summary-details-info {
        display: block;
        font-size: 12px;
        margin-top: 5px;
    }
    .summary-details-info.-second {
        margin-top: 10px;
    }
    .tt-icon.-car {
        height: 50px !important;
        width: 50px !important;
    }
    
.container{
    width: 70%;
}
    
.table-responsive {
    margin: 10px 0;
}
.table-wrapper {
    min-width: 800px;
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
    width: 100px;
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
.route{
    color: #d32020;
    margin-right: 8px;
    margin-top: 15px;
}
.errors{
    font-size: 8px;
    text-align: center;

}
.add-button {
  background-color: #007bff;
  color: #fff;
  border: none;
 
  font-size: 16px;
  border-radius: 5px;
  cursor: pointer;
}

.add-button i {
  margin-right: 5px;
}
#map {
        height: 400px;
        width: 100%;
      }


</style>
<div class='map-view'>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-body"></div>
      </div>
    
    <form class='tt-side-panel js-form' action="{{'/map'}}" method="post" enctype="multipart/form-data">
        <div class="modal-header">
            <button type="button" class="close d-block d-sm-none mr-auto btn  btn-danger text-black" data-toggle="modal" data-target="#addPurchaseModal" aria-label="Close">
                Click Me to add a Purchase
            </button>
             </div>
        
        @csrf
        <header class='tt-side-panel__header'>
            <div>
                <div class="input-group">
                           
                    <div id="reasonbox" class="tt-form-label searchbox pt-2">
                        <input type="text" name="start" id="start" class="form-control tt-search-box-input" placeholder="Enter start address" >
                    </div>
                </div>
                <div class="input-group">
                           
                    <div id="reasonbox" class="tt-form-label searchbox pt-2">
                        <input type="text" name="destination" id="destination" class="form-control tt-search-box-input" placeholder="Enter destination address" >
                    </div>
                </div>
                

               
              </div>
             
             
            <div class="searchbox-wrapper form-group">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                           
                            <div id="reasonbox" class="tt-form-label searchbox pt-2">
                                <input type="text" name="distance" id="distance" class="form-control tt-search-box-input" placeholder="Distance" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group">
                            
                            <div id="reasonbox" class="tt-form-label searchbox pt-2">
                                <input type="date" name="datet" id="datet" class="form-control tt-search-box-input" placeholder="Date" >
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
            @error('kms')
            <div class="text-danger errors">{{$message}}</div>
        @enderror
            <div class="searchbox-wrapper form-group">
                <i class="material-icons route">message</i>
                <div id='reasonbox' class='tt-form-label searchbox pt-2' >
                    <input type="text" name="reason" id="reason" class="form-control tt-search-box-input" placeholder="Reason">
                </div>
            </div>
            @error('reason')
            <div class="text-danger errors">{{$message}}</div>
        @enderror
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary" >Save</button>
                </div>
                <div class="col">
                    <div class="mobile-section"><i class="fa fa-calculator text-danger" aria-hidden="true"></i> <b class="text-danger">{{$totalAmount}}</b></div>
                </div>
                <div class="col">
                    
                    
                                            
                    
                </div>
                </div>
        </header>
        <div id="map"></div>
      
        
    </form>
    <div class="container ">
        <div class="table-responsive d-none d-sm-table">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4 text-danger"><h2><i class="fa fa-calculator" aria-hidden="true"></i> <b>{{$totalAmount}}</b></h2></div>
                        
                        <div class="col-sm-4">
                            <button class="add-button" data-toggle="modal" data-target="#addPurchaseModal">
                                <i class="material-icons">shopping_cart</i> Add Purchase
                              </button>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <i class="material-icons">&#xE8B6;</i>
                                <input type="text" class="form-control" placeholder="Search&hellip;">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered table-xsm">
                    <thead>
                        <tr>
                           
                            <th>From <i class="fa fa-sort"></i></th>
                            <th>Destination <i class="fa fa-sort"></i></th>
                            <th>Type</th>
                            <th>KM</th>
                            <th>Reason </th>
                            <th>Amount </th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($currentMonthData as $data )
                        @if ($data->transaction_type == 'Purchase')
                        <tr>
                            <small><td>{{$data->transaction_type}}</td></small>
                            <small><td>{{$data->transaction_type}} </td></small>
                            <small><td>{{$data->transaction_type}}</td></small>
                            <small><td>{{$data->transaction_type}}</td></small>
                            <small><td>{{$data->reason}}</td></small>
                            
                            <td><b>R</b><small>{{$data->amount}}</small> </td>
                            <td>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip" data-id="{{ $data->id }}"><i class="material-icons">&#xE872;</i></a>
                            </td>
                        </tr>
                        
                            
                        @else
                            <tr>
                           <small><td>{{$data->from_place}}</td></small>
                            <small><td>{{$data->to_place}} </td></small>
                            <small><td>{{$data->transaction_type}}</td></small>
                            <small><td>{{$data->kms}}</td></small>
                            <small><td>{{$data->reason}}</td></small>
                            
                            <td><b>R</b><small>{{$data->amount}}</small> </td>
                            <td>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip" data-id="{{ $data->id }}"><i class="material-icons">&#xE872;</i></a>
                                
                            </td>
                        </tr>
                        
                        @endif
                        
                        @endforeach
                               </tbody>
                </table>
                <div class="d-flex justify-content-left">
                    {{!! $currentMonthData->links() !!}}
                </div>
            </div>
        </div>  
    </div>
</div>

  
  <!-- Modal -->
  <div class="modal fade" id="addPurchaseModal" tabindex="-1" role="dialog" aria-labelledby="addPurchaseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="post" action="{{'/receipt'}}" enctype="multipart/form-data" id="myForm">
            @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="addPurchaseModalLabel">Add Purchase</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
           
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="receiptImage">Receipt Image:</label>
                    
                        <input type="file" class="form-control-file" id="receiptImage" name="receiptImage" accept="image/*" capture="camera" required>
                    </div>
                    <div class="col">
                    <img id="previewImage" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;">
                </div>
                @error('receiptImage')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                </div>
            </div>
        </div>
            <div class="form-group">
              <div class="row">
                <div class="col">
                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
                    @error('amount')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="amount">Amount:</label>
                    <input type="date" class="form-control" id="dates" name="dates"  required>
                @error('amount')
                    <div class="text-danger">{{$message}}</div>
                @enderror
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="reason">Reason:</label>
              <input type="text" class="form-control" id="reason" name="reason" placeholder="Enter reason" required>
            
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDErtDDwYgoI_L6619pr0wNeBnitQvmFb0&libraries=places&callback=initMap" async defer></script>
  <script>
    var map;
    var directionsService;
    var directionsRenderer;
    var startAutocomplete;
    var destinationAutocomplete;

    function initMap() {
      // Initialize the map
      map = new google.maps.Map(document.getElementById('map'), {
        
        center: {lat: -26.0322503541338, lng: 27.915369042945066}, // Default center coordinates (San Francisco)
        zoom: 13 // Default zoom level
      });

      // Initialize the Directions Service and Directions Renderer
      directionsService = new google.maps.DirectionsService();
      directionsRenderer = new google.maps.DirectionsRenderer();
      directionsRenderer.setMap(map);

      // Initialize the Autocomplete fields
      startAutocomplete = new google.maps.places.Autocomplete(document.getElementById('start'));
      destinationAutocomplete = new google.maps.places.Autocomplete(document.getElementById('destination'));

      // Add event listener for place changed event on destination Autocomplete
      destinationAutocomplete.addListener('place_changed', calculateDistance);
    }

    function calculateDistance() {
      var start = document.getElementById('start').value;
      var destination = document.getElementById('destination').value;

      var request = {
    origin: start,
    destination: destination,
    travelMode: 'DRIVING', // Other options: 'WALKING', 'BICYCLING', 'TRANSIT',
    provideRouteAlternatives: true, // Request alternative routes
  };

      directionsService.route(request, function(result, status) {
        if (status == 'OK') {
            directionsRenderer.setDirections(result);
    var distanceValue = result.routes[0].legs[0].distance.value; // Distance in meters
    document.getElementById('distance').value = distanceValue;
        } else {
          console.log('Error:', status);
        }
      });
    }
  </script>

@endsection