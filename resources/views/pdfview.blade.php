<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
     </head>
  <body>
    <div style="display: grid; justify-content: center;">
      <div style="display: flex; flex-direction: column; max-width: 600px;">
        <img src="images/cloudsell-200h.png" alt="image" style="max-width: 100%; margin-bottom: 1px;">
        <div style="padding: 5px; background-color: wheat;">
          <h2 style="text-align: center;">Job Card</h2><hr>
          <div style="display: grid; grid-template-columns: repeat(3, 1fr); margin-bottom: 16px; ">
            <div ><span style="font-weight: bold;">Date:</span>{{ \Carbon\Carbon::parse($datas['created_at'])->format('Y-m-d') }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: bold;">Time:</span>{{ \Carbon\Carbon::parse($datas['created_at'])->format('H:i') }}</div>
            
            <div><span style="font-weight: bold;">JobCard No:</span> {{ $datas['id'] }}</div>
          </div>
          <ul style="list-style: none; margin: 0; padding: 0; ">
            <li style="margin-top: 16px; text-decoration-line: underline;"><span style="font-weight: bold;">Company/Estate Name:</span> {{ $datas['sitename'] }}</li>
            <li style="margin-top: 16px;"><span style="font-weight: bold;">Technician Name:</span> {{ $datas['tachname'] }}</li>
            <li style="margin-top: 16px;"><span style="font-weight: bold;">Fault Report:</span> </li>
          </ul>
          <div style="display: flex; margin-top: 16px;">
            <div style="flex: 1;">
              @foreach(explode('.', $datas['description']) as $key => $sentence)
                 <p> {{ $key + 1 }}. {{ nl2br($sentence) }}<br></p>
              @endforeach
              
              
            </div>
            <div style="text-align: right; flex: 1;">
              <p>Callout - R550.00</p>
            </div>
          </div>
          <div style="display: grid; grid-template-columns: repeat(2, 1fr); margin-top: 16px;">
            <div style="padding-left: 0;"><span style="font-weight: bold;">Start Time:</span>{{ $datas['starttime'] }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: bold; text-align: right;">End Time:</span>{{ $datas['endtime'] }}</div>
            
          </div>
          <div style="display: grid; grid-template-columns: repeat(2, 1fr); margin-top: 16px;">
            <div><span style="font-weight: bold;">Client Name:</span>{{ $datas['clientname'] }}</div>
           
            
          </div>
          <div class="row">
            <div class="col">
              <span style="text-align: right;">Signature:</span>
              <div style="text-align: right; flex: 1;">
                <img src="images/{{ $datas['signature'] }}" alt="" style="text-align: right;"><hr>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    
    
   
     
  </body>
</html>