<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\PublicApp;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function PublicFormPage($id) {
        
        $job = Job::with('jobs')->findOrFail($id);
        return view('public.form_page', compact('job'));
    } // end method

    public function PublicStoreApplication(Request $request, $id) {
        $job = Job::with('jobs')->findOrFail($id);
        PublicApp::insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'job_id'=> $job->id,
            'created_at' => Carbon::now(),
            
        ]);
        $notification = array(
            'message' => 'Applied Successfully',
            'alert-type' => 'success'
        );

        return redirect('/')->with($notification);
    } // end method
}
           