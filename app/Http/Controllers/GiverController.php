<?php

namespace App\Http\Controllers;

use App\Models\Giver;
use Illuminate\Http\Request;






class GiverController extends Controller
{



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
        
       $post = Giver::find($giver);


        if($request->hasFile('ccna_document_url')){

            $request->validate([
              'ccna_document_url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('ccna_document_url')->store('public/images');
            $post->ccna_document_url = $path;

            $response = ['status' => '200',
            'success' => 'true', 
            'data' => 'Document upload was successful',];
            return response($response, 200);


        }
        elseif($request->hasFile('cpr_document_url')){


            $request->validate([
                'cpr_document_url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
              ]);
              $path = $request->file('cpr_document_url')->store('public/images');
              $post->cpr_document_url = $path;
  
              $response = ['status' => '200',
              'success' => 'true', 
              'data' => 'Document upload was successful',];
              return response($response, 200);


        }
        elseif($request->hasFile('covid_document_url')){


            $request->validate([
                'covid_document_url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
              ]);
              $path = $request->file('covid_document_url')->store('public/images');
              $post->covid_document_url = $path;
  
              $response = ['status' => '200',
              'success' => 'true', 
              'data' => 'Document upload was successful',];
              return response($response, 200);


        }
        elseif($request->hasFile('vehicle_document_url')){


            $request->validate([
                'vehicle_document_url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
              ]);
              $path = $request->file('vehicle_document_url')->store('public/images');
              $post->vehicle_document_url = $path;
  
              $response = ['status' => '200',
              'success' => 'true', 
              'data' => 'Document upload was successful',];
              return response($response, 200);


        }
        elseif($request->hasFile('resume_document_url')){


            $request->validate([
                'resume_document_url' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
              ]);
              $path = $request->file('resume_document_url')->store('public/images');
              $post->resume_document_url = $path;
  
              $response = ['status' => '200',
              'success' => 'true', 
              'data' => 'Document upload was successful',];
              return response($response, 200);


        }
        elseif($request->hasFile('profile_photo_url')){


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

        else{
            
            $response = ['status' => '400',
            'success' => 'false', 
            'data' => 'Document upload was not successful',];
            return response($response, 400);

        }

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
