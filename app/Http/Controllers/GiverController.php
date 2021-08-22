<?php

namespace App\Http\Controllers;

use App\Models\Giver;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;



class GiverController extends Controller
{

    public function __construct() {
        $this->middleware('auth:giver', ['except' => ['login', 'register']]);
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (! $token = Auth::guard('giver')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Giver::where('email', $request->email)->get();

        return response()->json(['token' => $this->createNewToken($token)]);
    }

    // Register
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' =>'required|string',
            'email' =>'required|string|unique:givers,email',
            'password' =>'required|string',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $giver = Giver::create([
            'name' =>$request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $credentials = $request->only(['email', 'password']);
        $token = Auth::guard('giver')->attempt($credentials);

        return response()->json(['token' => $this->createNewToken($token)], 201);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return Giver::paginate(20); 

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

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => Auth::guard('receiver')->user()
        ]);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }

    public function update(Request $request)
    {
        $giver = Auth::user();

        $giver->name = $request->name;
        $giver->email = $request->email;
        $giver->profile_photo_url = $request->profile_photo_url;
        
        $giver->save();

        return response()->json(['success'=>true], 204);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }
}
