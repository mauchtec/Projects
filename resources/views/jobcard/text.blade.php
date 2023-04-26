@extends('layouts.app')
@section('content')
<meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
@foreach ($datas as $data)
<div class="row justify-content-center">
  
  <div class="card col-6">
    
    <img
    src="images/cloudsell-200h.png"
    alt="image"
    class="home-image"
  />
    <div class="card-body mx-4">
      <div class="container text-dark">
        
        <p class="justify-content-center text-center" style="font-size: 30px;">Job Card</p>
        <div class="row">
          <div class="col-xl-4">
            <p>Date:</p>
          </div>
          <div class="col-xl-4">
            <p>Time:</p>
          </div>
          <div class="col-xl-4">
            <p>JobCard No:{{ $data['Serial'] }}</p>
          </div>
          <ul class="list-unstyled">
            
            <li class="text-muted mt-1"><span class="text-black">Company/Estate Name:</span>John Doe</li>
            <li class="text-muted mt-1"><span class="text-black">Technician Name:</span> #12345</li>
            <li class="text-muted mt-1"><span class="text-black">Fault Report:</span>April 17 2021</li>
                     
          </ul>
          <hr>
          <div class="col-xl-10">
            <p>Pro Package</p>
          </div>
          <div class="col-xl-2">
            <p class="float-end">$199.00
            </p>
          </div>
          <hr>
        </div>
        <div class="row">
          <div class="col-xl-10">
            <p>Consulting</p>
          </div>
          <div class="col-xl-2">
            <p class="float-end">$100.00
            </p>
          </div>
          <hr>
        </div>
        <div class="row">
          <div class="col-xl-10">
            <p>Support</p>
          </div>
          <div class="col-xl-2">
            <p class="float-end">$10.00
            </p>
          </div>
          <hr style="border: 2px solid black;">
        </div>
        <div class="row text-black">
          <div class="col-xl-12">
            <p class="float-end fw-bold">Total: $10.00
            </p>
          </div>
          <hr style="border: 2px solid black;">
        </div>
        <div class="row" >
          <div class="col-xl-6">
            <p>Start Time:</p>
          </div>
          <div class="col-xl-6">
            <p>End Time:</p>
          </div>
          
      </div>
      <div class="row" >
        <div class="col-xl-4">
          <p>Client Name:</p>
        </div>
        <div class="col-xl-6">
          <p>Signature:   <img src="images/{{ $data['image'] }}" alt=""></p>
        </div>
        
    </div>
    </div>
  </div>
</div>

  @endforeach
@endsection