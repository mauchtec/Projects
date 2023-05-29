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


</style>
<div class='map-view'>
    <form class='tt-side-panel js-form' action="{{'/map'}}" method="post" enctype="multipart/form-data">
        
        @csrf
        <header class='tt-side-panel__header'>
            <div class="searchbox-wrapper ">
                <div class='tt-icon icon-spacing -start'></div>
                <div id='startSearchBox' class='tt-form-label searchbox '></div>
               
            </div>
            @error('startSearchBoxInput')
            <div class="text-danger  errors">{{$message}}</div>
        @enderror
            <div class="searchbox-wrapper">
                <div class='tt-icon icon-spacing -finish'></div>
                <div id='finishSearchBox' class='tt-form-label searchbox'></div>
            </div>
            @error('finishSearchBoxInput')
            <div class="text-danger errors">{{$message}}</div>
        @enderror
             
            <div class="searchbox-wrapper form-group">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                           
                            <div id="reasonbox" class="tt-form-label searchbox pt-2">
                                <input type="text" name="kms" id="kms" class="form-control tt-search-box-input" placeholder="Distance" readonly>
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
                </div>
        </header>
        <div class='tt-tabs js-tabs' hidden='hidden' >
            <div class='tt-tabs__panel'>
                <div class='tt-results-list js-results'></div>
                <div class='js-results-loader' hidden='hidden'>
                    <div class='loader-center'><span class='loader'></span></div>
                </div>
                <div class='tt-tabs__placeholder js-results-placeholder -small'>
                    For results choose starting and destination points.
                </div>
            </div>
        </div>
      <div id='map' class='full-map'></div>
        
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
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
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
  
<script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps-web.min.js'></script>
<script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/services/services-web.min.js'></script>
<script type='text/javascript' src='js/mobile-or-tablet.js'></script>
<script type='text/javascript' src='js/foldable.js'></script>
<script type='text/javascript' src='js/formatters.js'></script>
<script type='text/javascript' src='js/info-hint.js'></script>
<script type='text/javascript' src='js/dom-helpers.js'></script>
<script type='text/javascript' src='js/results-manager.js'></script>
<script type='text/javascript' src='js/searchbox-enter-submit.js'></script>
<script src='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.2.0//SearchBox-web.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js'></script>
<script>
    var map = tt.map({
        key: 'QfJUWNjfB26COG6rWaaosseS70bHHXJE',
        container: 'map',
        dragPan: !isMobileOrTablet()
    });
    var routeMarkers = {}, routePoints = {}, searchBoxes = {};
    var finishMarkerElement = createMarkerElement('finish');
    var startMarkerElement = createMarkerElement('start');
    var errorHint = new InfoHint('error', 'bottom-center', 5000).addTo(document.getElementById('map'));
    var loadingHint = new InfoHint('info', 'bottom-center').addTo(document.getElementById('map'));
    var resultsManager = new ResultsManager();
    var detailsWrapper = document.createElement('div');
    var summaryContent = document.createElement('div'), summaryHeader;

    map.addControl(new tt.FullscreenControl({container: document.querySelector('body')}));
    map.addControl(new tt.NavigationControl());
    map.on('load', function() {
        searchBoxes.start = createSearchBox('start');
        searchBoxes.finish = createSearchBox('finish');
    });

    function addRouteMarkers(type, point) {
        var lngLat = point && point[type + 'Point'] || routePoints[type];

        if (!routeMarkers[type] && routePoints[type]) {
            routeMarkers[type] = createMarker(type, lngLat);
        }
        if (routeMarkers[type]) {
            routeMarkers[type].setLngLat(routePoints[type]);
        }
    }

    function centerMap(lngLat) {
        map.flyTo({
            center: lngLat,
            speed: 10,
            zoom: 8
        });
    }

    function clearMap() {
        if (!map.getLayer('route')) {
            return;
        }
        map.removeLayer('route');
        map.removeSource('route');
    }

    function createMarker(type, lngLat) {
        var markerElement = type === 'start' ? startMarkerElement : finishMarkerElement;

        return new tt.Marker({ draggable: true, element: markerElement })
            .setLngLat(lngLat || routePoints[type])
            .addTo(map)
            .on('dragend', getDraggedMarkerPosition.bind(null, type));
    }

    function createMarkerElement(type) {
        var element = document.createElement('div');
        var innerElement = document.createElement('div');

        element.className = 'draggable-marker';
        innerElement.className = 'tt-icon -white -' + type;
        element.appendChild(innerElement);
        return element;
    }

    function createSearchBox(type) {
        
    var searchBox = new tt.plugins.SearchBox(tt.services, {
        showSearchButton: false,
        searchOptions: {
            key: 'QfJUWNjfB26COG6rWaaosseS70bHHXJE'
        },
        labels: {
            placeholder: 'Query e.g. Washington'
        }
    });

    // Get the search box input element
    var searchBoxInput = searchBox.getSearchBoxHTML().querySelector('.tt-search-box-input');

    // Set the name and ID attributes
    searchBoxInput.name = type + 'SearchBoxInput';
    searchBoxInput.id = type + 'SearchBoxInput';

    document.getElementById(type + 'SearchBox').appendChild(searchBox.getSearchBoxHTML());
    searchBox.on('tomtom.searchbox.resultscleared', onResultCleared.bind(null, type));

    searchBox.on('tomtom.searchbox.resultsfound', function(event) {
        handleEnterSubmit(event, onResultSelected.bind(this), errorHint, type);
    });

    searchBox.on('tomtom.searchbox.resultselected', function(event) {
        if (event.data && event.data.result) {
            console.log(event.data.result.address.freeformAddress);
            onResultSelected(event.data.result, type);
        }
    });

    return searchBox;
}


    function createSummaryContent(feature) {
        $('#kms').val(Formatters.formatAsMetricDistance(feature.lengthInMeters));
        if (!summaryHeader) {
            summaryHeader = DomHelpers.elementFactory('div', 'summary-header', 'Route summary');
            summaryContent.appendChild(summaryHeader);
        }
        var detailsHTML =
            '<div class="summary-details-top text-dark">Leave now</div>' +
            '<div class="summary-details-bottom">' +
                '<div class="summary-icon-wrapper">' +
                    '<span class="tt-icon -car -big"></span>' +
                '</div>' +
                '<div class="summary-details-text">' +
                    '<span class="summary-details-info text-dark">Distance: <b name="km" id="km"> ' +
                        Formatters.formatAsMetricDistance(feature.lengthInMeters) +
                    '</b></span>' +
                    '<span class="summary-details-info -second text-dark">Arrive: <b name="trusts">' +
                        Formatters.formatToExpandedDateTimeString(feature.arrivalTime) +
                    '</b></span>' +
                '</div>' +
            '</div>';

        detailsWrapper.innerHTML = detailsHTML;
        summaryContent.appendChild(detailsWrapper);
        return summaryContent;
    }

    function getDraggedMarkerPosition(type) {
        var lngLat = routeMarkers[type].getLngLat();

        performReverseGeocodeRequest(lngLat)
            .then(function(response) {
                var addresses = response.addresses[0];
                var freeFormAddress = addresses.address.freeformAddress;

                if (!freeFormAddress) {
                    loadingHint.hide();
                    clearMap();
                    resultsManager.resultsNotFound();
                    errorHint.setMessage('Address not found, please choose a different place');
                    return;
                }
                searchBoxes[type]
                    .getSearchBoxHTML()
                    .querySelector('input.tt-search-box-input')
                    .value = freeFormAddress;
                var position = {
                    lng: addresses.position.lng,
                    lat: addresses.position.lat
                };

                updateMapView(type, position);
            });
    }

    function handleCalculateRouteError() {
        clearMap();
        resultsManager.resultsNotFound();
        errorHint.setMessage('There was a problem calculating the route');
        loadingHint.hide();
    }

    function handleCalculateRouteResponse(response, type) {
        var geojson = response.toGeoJson();
        var coordinates = geojson.features[0].geometry.coordinates;

        clearMap();
        map.addLayer({
            'id': 'route',
            'type': 'line',
            'source': {
                'type': 'geojson',
                'data': geojson
            },
            'paint': {
                'line-color': '#4a90e2',
                'line-width': 6
            }
        });
        var bounds = new tt.LngLatBounds();
        var point = {
            startPoint: coordinates[0],
            finishPoint: coordinates.slice(-1)[0]
        };
        addRouteMarkers(type, point);
        resultsManager.success();
        resultsManager.append(createSummaryContent(geojson.features[0].properties.summary));
        coordinates.forEach(function(point) {
            bounds.extend(tt.LngLat.convert(point));
        });
        map.fitBounds(bounds, { duration: 0, padding: 50 });
        loadingHint.hide();
    }

    function handleDrawRoute(type) {
        errorHint.hide();
        loadingHint.setMessage('Loading...');
        resultsManager.loading();
        performCalculateRouteRequest()
            .then(function(response) {
                handleCalculateRouteResponse(response, type);
            })
            .catch(handleCalculateRouteError);
    }

    function onResultCleared(type) {
        routePoints[type] = null;
        if (routeMarkers[type]) {
            routeMarkers[type].remove();
            routeMarkers[type] = null;
        }
        if (shouldDisplayPlaceholder()) {
            resultsManager.resultsNotFound();
        }
        if (routePoints.start || routePoints.finish) {
            var lngLat = type === 'start' ? routePoints.finish : routePoints.start;
            clearMap();
            centerMap(lngLat);
        }
    }

    function onResultSelected(result, type) {
        var position = result.position;

        updateMapView(type, position);
    }

    function performCalculateRouteRequest() {
        return tt.services.calculateRoute({
            key: 'QfJUWNjfB26COG6rWaaosseS70bHHXJE',
            traffic: false,
            locations: routePoints.start.join() + ':' + routePoints.finish.join()
        });
    }

    function performReverseGeocodeRequest(lngLat) {
        return tt.services.reverseGeocode({
            key: 'QfJUWNjfB26COG6rWaaosseS70bHHXJE',
            position: lngLat
        });
    }

    function shouldDisplayPlaceholder() {
        return !(routePoints.start && routePoints.finish);
    }

    function updateMapView(type, position) {
        routePoints[type] = [position.lng, position.lat];
        if (routePoints.start && routePoints.finish) {
            handleDrawRoute(type);
        } else {
            addRouteMarkers(type);
            centerMap(routePoints[type]);
        }
    }

    /////////////////saving receipt////////////////////////

    document.getElementById('receiptImage').addEventListener('change', function(event) {
    var input = event.target;
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('previewImage').setAttribute('src', e.target.result);
        document.getElementById('previewImage').style.display = 'block';
      }
      reader.readAsDataURL(input.files[0]);
    }
  });


</script>
@endsection