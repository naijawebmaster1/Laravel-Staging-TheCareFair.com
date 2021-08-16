<?php

namespace App\Http\Controllers;

use App\Models\Giver;
use Illuminate\Http\Request;






class GiverController extends Controller
{


    // Register
    public function register(Request $request){
        $fields = $request->validate([
            'name' =>'required|string',
            'email' =>'required|string|unique:givers,email',
            'phone' =>'required',
            'birthdate' =>'required',
            'zip_code' =>'required',
            'password' =>'required|string|confirmed',

        ]);

        $user = Giver::create([
            'name' =>$fields['name'],
            'email' =>$fields['email'],
            'phone' =>$fields['salary'],
            'yearsofexperience' =>$fields['yearsofexperience'],
            'password' => bcrypt($fields['password'])
        ]);

            $token = $user->createToken('myapptoken')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response ($response, 201);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return Giver::all(); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Giver  $giver
     * @return \Illuminate\Http\Response
     */
    public function show(Giver $giver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Giver  $giver
     * @return \Illuminate\Http\Response
     */
    public function  update(Request $request, Giver $giver)
    {
        //
        $giver->update($request->all());

        return response()->json($giver, 200);


    }


    public function  upload(Request $request, Giver $giver)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Product::create($input);
     
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Giver  $giver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giver $giver)
    {
        //
    }
}
