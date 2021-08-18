<?php

namespace App\Http\Controllers;

use App\Models\Receiver;
use App\Models\Giver;

use Illuminate\Http\Request;

class ReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return Receiver::all(); 


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
     * @param  \App\Models\receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function showGiver(Giver $giver) 
    {
        //


            $response = ['status' => '200',
            'success' => 'true', 
            'data' => $giver,];
            return response($response, 200);

            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receiver $receiver)
    {
        //
        //
        $receiver->update($request->all());

               // return response()->json($receiver, 200);              


       if($request->hasFile('ccna_document_url')){

          $post = Giver::find($giver);


           $request->validate([
             'profile_photo_url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
           ]);


           $path = $request->file('profile_photo_url')->store('public/images');
           $post->profile_photo_url = $path;

           $response = ['status' => '200',
           'success' => 'true', 
           'data' => 'Document upload was successful',];
           return response($response, 200);


       }

                $response = ['status' => '200',
                'success' => 'true', 
                'data' => $receiver,];
                return response($response, 200);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\receiver  $receiver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receiver $receiver)
    {
        //
    }





    public function giversList()
    {
        //

        $givers = Giver::all(); 


        $response = ['status' => '200',
        'success' => 'true', 
        'data' => $givers,];
        return response($response, 200);

    }
}
