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
        $imageName = null;
    
        if ($request->hasFile('imaged')) {
            $image = $request->file('imaged');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
        } elseif (preg_match('/^data:image\/(png|jpeg|jpg|gif);base64,/i', $request->imaged)) {
            $imageData = base64_decode(preg_replace('/^data:image\/(png|jpeg|jpg|gif);base64,/i', '', $request->imaged));
            $image = imagecreatefromstring($imageData);
            if ($image !== false) {
                $imageName = uniqid() . '.png';
                $imagePath = public_path('images/' . $imageName);
                imagepng($image, $imagePath);
                imagedestroy($image);
            }
        }
    
        if ($imageName) {
            $image = new Sim();
            $image->serial = $request->serial;
            $image->image = $imageName;
            $image->active = 0;
            $image->user_id = auth()->id();
            $image->save();
    
            return redirect()->back()->with('success', 'Image uploaded successfully.');
        }
    
        return redirect()->back()->with('error', 'No image was uploaded.');
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

        //dd($sim);
        Storage::delete('storage/images/'.$sim->image);
        $sim->delete();
        return response()->json(['success' => true]);
    }
}
