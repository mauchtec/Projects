<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;


use Dompdf\Options;
use App\Models\User;

use App\Models\Jobcard;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        
        Return view('jobcard.text');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      

        $jobcard = Jobcard::where('id', 5)->first();
        $datas = $jobcard->toArray();
        //dd($datas);
$view = view('pdf_view', compact('datas'));
//dd($view);
$pdf = PDF::loadHTML($view);
return $pdf->download('pdf_file.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Check if a file was uploaded
        if ($request->hasFile('sql_file')) {
            // Get the uploaded file
            $file = $request->file('sql_file');

            // Get the contents of the file
            $sql = file_get_contents($file->getPathname());

            // Execute the SQL
            DB::unprepared($sql);

            // Return a response
            return response()->json(['status' => 'success']);
        } else {
            // Return an error response
            return response()->json(['status' => 'error', 'message' => 'No file uploaded']);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::all()->toArray();

        $pdf = new Dompdf();
        
        $pdf= PDF::loadView('jobcard.pdf', ['users' => $users]);
        return $pdf->stream();

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
