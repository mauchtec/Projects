<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        //dd($request);
        $this->validate($request,[
            'first_name'=>'required|max:250',
            'last_name'=>'required|max:250',
            'email'=>'required|email',
            'password'=>'required|confirmed',

        ]);

        User::create([
            'name'=>$request->first_name,
            'surname'=>$request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));
        return redirect()->route('dashboard');

        
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return response()->json($user->toArray());
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'first_name'=>'required|max:250',
            'last_name'=>'required|max:250',
            'email'=>'required|email',
            

        ]);
        $data = User::find($id);
        $data->name = $request->input('first_name');
        $data->email = $request->input('last_name');
        $data->surname = $request->input('email');
        $data->save();
        
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
        $user = User::find($id);
        $user->delete();

        Return response()->json(['success'=>true]);
    }
}
