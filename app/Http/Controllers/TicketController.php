<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Sitenames = Site::pluck('sitename');
        return view('tickets.index',['Sitenames'=>$Sitenames]);
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
        $this->validate($request,[
            'sitename'=>'required',
            'priority'=>'required',
            'status'=>'required',
            'technician'=>'required',
            'description'=>'required',
        ]);

        $ticket = new Ticket();
        $ticket->sitename = $request->sitename;
        $ticket->description = $request->description;
        $ticket->technician = $request->technician;
        $ticket->priority= $request->priority;
        $ticket->status =$request->status;
        $ticket->user_id = auth()->id();
        $ticket->save();
     
    return redirect()->back()->with('success', 'Ticket saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        
        $getsite = $request->input('value');
        $sitetickets = DB::table('tickets')
        ->where('sitename', 'LIKE', '%'.$getsite.'%')
        ->get();
        //dd($sitetickets);
        return response()->json($sitetickets);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
