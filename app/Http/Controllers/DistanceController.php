<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\Distance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistanceController extends Controller
{
    public function index(){
        $currentMonthData = Distance::where('user_id', auth()->id())
                            ->whereMonth('created_at', '=', date('m'))
                            ->orderBy('id', 'desc')
                            ->paginate(2);
                            $currentMonth = Carbon::now()->month;
                            $totalAmount = DB::table('distances')
                                ->whereMonth('created_at', $currentMonth)
                                ->sum('amount');
                        
        
        
        Return view('travellogs.index',[ 'currentMonthData'=>$currentMonthData,'totalAmount'=>$totalAmount]);
    }
    public function store(Request $request){
        dd($request);
 $distance = $request->kms;
 $numericDistance = floatval($distance);
   

        $this->validate($request,[
            'startSearchBoxInput'=>'required',
            'finishSearchBoxInput'=>'required',
            'kms'=>'required',
            'reason'=>'required',
                       
        ]);
       
        
        $distance = New Distance();
        $distance->user_id = auth()->id();
        $distance->from_place = $request->startSearchBoxInput;
        $distance->to_place =$request->finishSearchBoxInput;
        $distance->reason=$request->reason;
        $distance->kms = $numericDistance;
        $distance->transaction_type = 'Fuel';
        $distance->amount = $numericDistance*3.20;
        $distance->save();

        return back()->with('success','Jobcard created successfully!');
    }
    public function receipt(Request $request){
       //dd($request->file('receiptImage'));
        /*$this->validate($request,[
            'amount'=>'required|numeric',
            'reason'=>'required',
            'receiptImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);*/
        
        if ($request->hasFile('receiptImage')) {
            $image = $request->file('receiptImage');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $receipt = New Distance();
            $receipt->user_id = auth()->id();
            $receipt->reason=$request->reason;
            $receipt->transaction_type = 'Purchase';
            $receipt->amount=$request->amount;
            $receipt->reciept=$imageName;
            $receipt->save();
        }
            return back()->with('success','Jobcard created successfully!');

        $receipt = New Distance();
    }

    public function calculateDistance()
    {
        
        $apiKey = 'QfJUWNjfB26COG6rWaaosseS70bHHXJE'; // Replace with your TomTom API key

        $origin = '-26.1076204,28.0488492'; // Example: Cape Town coordinates (latitude,longitude)
        $destination = '-26.0315778,27.9942116'; // Example: Randburg coordinates (latitude,longitude)


        $client = new \GuzzleHttp\Client([
            'verify' => false
        ]);
        
        $response = $client->request('GET', 'https://api.tomtom.com/routing/1/calculateRoute/' . $origin . ':' . $destination . '/json', [
            'query' => [
                'key' => $apiKey,
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $distanceInKm = $data['routes'][0]['summary']['lengthInMeters'] / 1000;
        dd($distanceInKm);
        return 'Distance: ' . $distanceInKm . ' km';
    }
}
