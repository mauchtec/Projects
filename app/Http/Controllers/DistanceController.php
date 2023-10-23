<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Distance;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DistanceExport;
use Illuminate\Support\Facades\DB;




class DistanceController extends Controller
{
    public function index(){
       
        $currentMonthData = Distance::where('user_id', auth()->id())
                            ->whereMonth('dates', '=', date('m'))
                            ->orderBy('id', 'desc')
                            ->paginate(10);
                            $currentMonth = Carbon::now()->month;
                            $totalAmount = DB::table('distances')
                                ->whereMonth('dates', $currentMonth)
                               ->where('user_id', auth()->id())
                                ->sum('amount');
       
       // dd($userTotals);
        
        Return view('travellogs.index',[ 'currentMonthData'=>$currentMonthData,'totalAmount'=>$totalAmount]);
    }


    public function dashboard(){
        $currentMonth = Carbon::now()->format('m');

        $data = DB::table('distances')
        ->whereMonth('created_at', $currentMonth)
        ->get();


        $userTotals = User::with('distances')
        ->select('users.*', DB::raw('SUM(distances.amount) as totalAmount'), DB::raw('SUM(distances.kms) as km'), 'users.name', 'users.surname')
        ->leftJoin('distances', 'users.id', '=', 'distances.user_id')
        ->whereMonth('distances.dates', '=', $currentMonth)
        ->groupBy('users.id', 'users.name', 'users.surname')
        ->get();
    
       $Month = Carbon::now()->format('F');
        
       return view('travellogs.dashboard', compact('userTotals', 'data', 'Month'));

    }
    public function store(Request $request){
        dd($request->distance);
 $distance = $request->distance;
 $numericDistance = ($distance);
   
dd($distance);
        $this->validate($request,[
            'start'=>'required',
            'destination'=>'required',
            'distance'=>'required',
            'datet'=>'required|date',
            'reason'=>'required',
                       
        ]);
       
        
        $distance = New Distance();
        $distance->user_id = auth()->id();
        $distance->from_place = $request->start;
        $distance->to_place =$request->destination;
        $distance->reason=$request->reason;
        $distance->dates=$request->datet;
        $distance->kms = $distance;
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
            $receipt->dates=$request->dates;
            $receipt->transaction_type = 'Purchase';
            $receipt->amount=$request->amount;
            $receipt->reciept=$imageName;
            $receipt->save();
        }
            return back()->with('success','Jobcard created successfully!');

        $receipt = New Distance();
    }
    public function Delete($id){
     
        // Find the map item by its ID
        $map = Distance::findOrFail($id);

        // Perform the deletion
        $map->delete();

        // Optionally, you can add a success message or redirect back
        // after deleting the item
        return response()->json(['success' => true]);
        
    }


    public function export($id)
{
    
    $userId = $id;
    $fileName = 'distance_data.xlsx';

    return Excel::stream(new DistanceExport($userId),$fileName);
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
