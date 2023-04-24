<?php

namespace App\Http\Controllers;

use App\Models\Sim;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\Return_;

class SimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $images = Sim::all()->sortBy('active');

        return view('sims.index', compact('images'));
        
        
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
        
       // dd($request);
        $imageData = $request->imaged; // base64-encoded PNG image data
$pattern = '/^data:image\/(png|jpeg|jpg|gif);base64,/i';
$isBase64 = preg_match($pattern, $imageData);

if ($isBase64) {
    dd($request);
    $imageData = base64_decode(preg_replace($pattern, '', $imageData));
    $image = imagecreatefromstring($imageData);
    if ($image !== false) {
        $imageName  =  uniqid().'.png';
        $imagePath = public_path('images/'. $imageName);
        imagepng($image, $imagePath);
        imagedestroy($image);
        dd($imageName);
    }
} else {
    $image = $imageData;
    $image = $request->file('imaged');
$imageExtension = $image->extension();
    // Generate a unique filename for the image

    $imageName = time().'.'.$imageExtension;  
     
    $request->imaged->move(public_path('images'), $imageName);
    
    dd($imageName);
}
        $img = $request->image;
    $folderPath = "public/images/";
    
    
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
    
 
    file_put_contents(public_path('images/'.$fileName), $image_base64);
    

    $image = new Sim();
        $image->serial=$request->serial;
        $image->image = $fileName;
        $image->active =0;
        $image->user_id=auth()->id();
        $image->save();
    
        return redirect()->back()->with('success', 'Image uploaded successfully.');
 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $sim = Sim::where('user_id',$id)->get();
        Return response()->json($sim);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sim = Sim::find($id);
        $sites = Site::all();
        $data =[
            'sim'=>$sim,
            'sites'=>$sites,
        ];
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'simserial'=>'required',
            'purpose'=>'required',
            'status'=>'required',
            'sitenames'=>'required'
        ]);
       if($request->purpose=='scanner' && $request->scannernum){
            $request->validate([            
                'scannernum'=>'required',           
            ]);

       }
       $data = Sim::find($id);
        
       $data->sitename = $request->input('sitenames');
       $data->user_id = auth()->id();
       $data->Serial = $request->input('simserial');
       $data->Purpose = $request->input('purpose');
        $data->scanner = $request->input('scannernum');
       $data->active= $request->input('status');
       $data->save();
       return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sim = Sim::findOrFail($id);

        dd($sim);
        Storage::delete('storage/images/'.$sim->image);
        $sim->delete();
        //
    }
}
