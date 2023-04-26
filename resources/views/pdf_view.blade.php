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
        <img src="images/cloudsell-200h.png" alt="image" style="max-width: 100%; margin-bottom: 16px;">
        <div style="padding: 16px; background-color: #fff;">
          <h2 style="text-align: center;">Job Card</h2>
          <div style="display: grid; grid-template-columns: repeat(3, 1fr); margin-bottom: 16px; ">
            <div ><span style="font-weight: bold;">Date:</span>{{ \Carbon\Carbon::parse($datas['created_at'])->format('Y-m-d') }}</div>
            <div><span style="font-weight: bold;">Time:</span>{{ \Carbon\Carbon::parse($datas['created_at'])->format('H:i') }}</div>
            <div><span style="font-weight: bold;">JobCard No:</span> {{ $datas['id'] }}</div>
          </div>
          <ul style="list-style: none; margin: 0; padding: 0;">
            <li style="margin-top: 16px;"><span style="font-weight: bold;">Company/Estate Name:</span> {{ $datas['sitename'] }}</li>
            <li style="margin-top: 16px;"><span style="font-weight: bold;">Technician Name:</span> {{ $datas['tachname'] }}</li>
            <li style="margin-top: 16px;"><span style="font-weight: bold;">Fault Report:</span> </li>
          </ul>
          <div style="display: flex; margin-top: 16px;">
            <div style="flex: 1;">
              <p>{{ $datas['description'] }}</p>
            </div>
            <div style="text-align: right;">
              <p>$100.00</p>
            </div>
          </div>
          <div style="display: grid; grid-template-columns: repeat(2, 1fr); margin-top: 16px;">
            <div style="padding-left: 0;"><span style="font-weight: bold;">Start Time:</span>{{ $datas['starttime'] }} </div>
            <div><span style="font-weight: bold;">End Time:</span>{{ $datas['endtime'] }}</div>
          </div>
          <div style="display: grid; grid-template-columns: repeat(2, 1fr); margin-top: 16px;">
            <div><span style="font-weight: bold;">Client Name:</span>{{ $datas['clientname'] }}</div><hr>
            <div style="display: flex; justify-content: flex-end;">
              <div><span style="font-weight: bold;">Signature:</span> <img src="images/{{ $datas['signature'] }}" alt=""></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
   
     
  </body>
</html>