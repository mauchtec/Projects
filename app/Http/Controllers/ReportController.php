<?php

namespace App\Http\Controllers;

use TCPDF;
use App\Models\Site;
use App\Models\User;

use App\Models\Jobcard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {



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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        
       // Get all users from the database
    $jobcard = Jobcard::find($id);

    // Set up the PDF document
    $pdf = new TCPDF();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $image = file_get_contents('storage/images/cloudsell.png');

    $signature = file_get_contents('storage/'. $jobcard->signature  .'');

    // Generate the table of users $html = '<input type="image" src="storage/images/'. $jobcard->signature  .'" alt="">';

    $pdf->Setfont('helvetica','B',12);
        
    $pdf->SetXY(20,20);
    $pdf->Image('@'.$image,'','',150);
    $pdf->SetXY(20,20);
    $html=('<br>');
    $html .= '<br>';
    $html .= '<br>';
    $html .= '<br>';
    $html .= '<br>';
    $html .= '<br>';
   
    $html .= '<p><em>Technician Name:</em>' ."   ". $jobcard->tachname .'</p>';
    $html .= '<p>Client Email:<em>' ."   ". $jobcard->clientemail . '</em></p>';
    $html .= '<p>Site Name:<em>' ."   ". $jobcard->sitename . '</em></p>';
    $html .= '<p>Site Number:<em>' ."   ". $jobcard->clientnumber . '</em></p>';
    $html .= '<p>Description:<em>' ."   ". $jobcard->description . '</em></p>';
    $pdf->Image('@'.$signature,150,140,50,50);

    // Output the HTML as a PDF
    $pdf->writeHTML( $html,true, false, true, false, '');
    $fileName = time() . '.pdf';
    //$pdf_data = $pdf->Output($fileName ,'I');
    Storage::put($pdf->Output($fileName ,'I'));



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
