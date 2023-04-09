<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $sites = Site::paginate(10);
        Return view('sites.sites',[ 'sites'=>$sites]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        Site::create([
            'user_id'=>auth()->id(),
            'sitename'=>$request->sitename,
            'contactperson'=>$request->contactperson,
            'sitenumber'=>$request->sitenumber,
            'coodinates'=>$request->coodinates,
            'email'=>$request->email,
            'siteaddress'=>$request->address,
            'notes'=>$request->notes,
            'link' =>$request->link,
        ]);

        return response()->json(['statuss'=>'success']);
    }

    /**
     * Display the specified resource.
     */
    public function search(Request $request)
    {
       
        $searchsite = $request->input('searchsite');
        $sites = DB::table('sites')
        ->where('sitename', 'LIKE', '%'.$searchsite.'%')
        ->orWhere('contactperson', 'LIKE', '%'.$searchsite.'%')
        ->orWhere('email', 'LIKE', '%'.$searchsite.'%')
        ->orWhere('sitenumber', 'LIKE', '%'.$searchsite.'%')
        ->get();
        return response()->json($sites);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
        $site = Site::find($id);
        return response()->json($site->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     
       
        $data = Site::find($id);
        
        $data->sitename = $request->input('sitenames');
        $data->user_id = auth()->id();
        $data->contactperson = $request->input('contactpersons');
        $data->email = $request->input('emails');
        $data->sitenumber = $request->input('sitenumbers');
        $data->coodinates = $request->input('coodinate');
        $data->siteaddress = $request->input('addres');
        $data->link = $request->input('links');
        $data->notes = $request->input('note');
        $data->save();
        return response()->json(['success' => true]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $site = Site::find($id);
        $site->delete();

        Return response()->json(['success'=>true]);
    }
}
