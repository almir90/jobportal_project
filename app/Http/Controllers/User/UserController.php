<?php

namespace App\Http\Controllers\User;

use App\Models\Job;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\PublicApp;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
  
     
      public function HomePage() {
        $clients = Client::with('users')->get();
        return view('user.home', compact('clients'));
      } // end method

      public function UserAddPosition() {
        return view('user.add_position');
      } // end method

      public function UserStorePosition(Request $request){
        Job::insert([
            'job_position' => $request->job_position,
            'job_type' => $request->job_type,
            'location' => $request->location,
            'job_description' => $request->job_description,
            'created_at' => Carbon::now(),
            'created_by' => Auth::user()->id
        ]);
        

        $notification = array(
            'message' => 'Job Added Successfully',
            'alert-type' => 'success'
        );

        return redirect('home/list/position')->with($notification);
      } // end method

      public function UserListPosition() {
        $jobs = Job::where('created_by', Auth::user()->id)->get();
        return view('user.position_list', compact('jobs'));
      } // end method

      public function UserEditPosition($id) {
        $job = Job::with('jobs')->findOrFail($id);
        return view('user.edit_position', compact('job'));
    } // end method

    public function UserUpdatePosition(Request $request) {
        $job_id = $request->id;
        Job::findOrFail($job_id)->update([
            'job_position' => $request->job_position,
            'job_type' => $request->job_type,
            'location' => $request->location,
            'job_description' => $request->job_description,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Job Position Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect('/home/list/position')->with($notification);
    } // end method

    public function UserDeletePosition($id) {
      Job::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Position Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('/home/list/position')->with($notification);
    } // end method

    public function UserApplicationList() {
      $user_apps = PublicApp::latest()->get();
      $user_id = Auth::user()->id;

      return view('user.application_list', compact('user_apps'));
    } // end method

    
      
}
            
            