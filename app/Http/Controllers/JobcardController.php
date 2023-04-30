<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Jobcard;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JobcardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$browsers = Site::all();
        $browsers = Site::pluck('sitename');
        $jobs = Jobcard::all();
        //dd($browsers);
    return view('jobcard.index',['browsers'=>$browsers,'jobs'=>$jobs]);
    
        
    }

   
public function submit(Request $request)
{
    
    $user = Auth::user();
    $request->validate([
        'clientname'=>'required',
        'phone'=>'required|',
        'email'=>'required|email',
        'sitename'=>'required',

    ]);
    $signatureData = $request->input('trust');
    $decodedData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $signatureData));
    
    $fileName = uniqid() . '.png';
    $filePath = public_path('images/' . $fileName);
    file_put_contents($filePath, $decodedData);

  
    $jobcard = new Jobcard();
    $jobcard->tachname =$user->name;
    $jobcard->clientnumber = $request->phone;
    $jobcard->signature = $fileName;
    $jobcard->clientname = $request->clientname;
    $jobcard->clientemail = $request->email;
    $jobcard->sitename = $request->sitename;
    $jobcard->user_id = auth()->id();
    $jobcard->description = $request->description;
    $jobcard->starttime = $request->start;
    $jobcard->endtime = $request->end;
    $jobcard->save();

    return back()->with('success','Jobcard created successfully!');

}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        dd();
    }

    /**
     * Display the specified resource.
     *  public function show(string $id)
    *{
     
       * $jobcard = Jobcard::where('id', $id)->first();
        *$datas = $jobcard->toArray();
       * dd($datas);
        *$view = view('pdf_view', compact('datas'));
        *dd($view);
        *$pdf = PDF::loadHTML($view);
        
*return $pdf->stream('pdf_file.pdf');
    *}
     * 
     */
    public function show(string $id)
    {
     
        $jobcard = Jobcard::where('id', $id)->first();
        $datas = $jobcard->toArray();
        //dd($datas);
        $view = view('pdfview', compact('datas'));
        //dd($view);
        $pdf = PDF::loadHTML($view);
        //$pdf->useBootstrap();
        $filename =$datas ['sitename']. '.pdf';
        //dd($filename);
return $pdf->stream($filename);
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
