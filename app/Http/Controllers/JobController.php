<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct() {
        $this->middleware('auth:receiver');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::paginate(10);
        return response()->json(['data' => $jobs, 'success'=>true], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'location' => 'required|string',
            'distance' => 'required|string',
            'minimum_rate' => 'required|string',
            'maximum_rate' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $job = Job::create([
                'title' => $request->title,
                'location' => $request->location,
                'distance' => $request->distance,
                'minimum_rate' => $request->minimum_rate,
                'maximum_rate' => $request->maximum_rate,
                'languages' => $request->languages,
                'minimum_years_of_experience' => $request->minimum_years_of_experience,
                'status' => $request->status,
                'description' => $request->description,
                'receiver_id' => Auth::user()->id,
            ]);

            return response()->json(['data' => $job, 'success'=>true], 201);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'success'=>false], 409);
        }
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


    public function updateStatus(Job $job)
    {
        $job->status = false;
        return response()->json(['success'=>true], 204);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $job->title = $request->title;
        $job->location = $request->location;
        $job->distance = $request->distance;
        $job->minimum_rate = $request->minimum_rate;
        $job->maximum_rate = $request->maximum_rate;
        $job->languages = $request->languages;
        $job->minimum_years_of_experience = $request->minimum_years_of_experience;
        $job->status = $request->status;
        $job->description = $request->description;
        
        $job->save();

        return response()->json(['success'=>true], 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        // $job = Job::findOrFail($id)->delete();
        $job->delete();
        return response()->json(['status'=>true], 204);
    }
}
