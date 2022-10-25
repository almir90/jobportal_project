<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\PublicApp;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    } // end method
    
    public function AdminPostJob() {
        return view('admin.add_clients');
    } // end method

    public function AdminPostCompany(Request $request) {
        Client::insert([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_email' => $request->company_email,
            'company_mobile_no' => $request->company_mobile_no,
            'company_description' => $request->company_description,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Company Added Successfully',
            'alert-type' => 'success'
        );

        return redirect('/admin/client/list')->with($notification);
    } // end method

    public function AdminClientList() {
        $clients = Client::latest()->get();
        return view('admin.client_list', compact('clients'));
    } // end method

    public function AdminEditClient($id) {
        $client = Client::findOrFail($id);
        return view('admin.edit_client', compact('client'));
    } // end method

    public function AdminUpdateClient(Request $request) {
        $client_id = $request->id;
        Client::findOrFail($client_id)->update([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_email' => $request->company_email,
            'company_mobile_no' => $request->company_mobile_no,
            'company_description' => $request->company_description,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Company Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect('/admin/client/list')->with($notification);
    } // end method

    public function AdminDeleteClient($id) {
        Client::findOrFail($id)->delete();
        
        $notification = array(
            'message' => 'Company Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect('/admin/client/list')->with($notification);
    } // end method

    public function AdminJobList() {
        $jobs = Job::latest()->get();
        return view('admin.job_list',compact('jobs'));
    } // end method

    public function AdminJobApplications() {
        $all_apps = PublicApp::latest()->get();
        return view('admin.job_applications', compact('all_apps'));
    } // end method

    public function AdminStatistics() {
        $apps = PublicApp::count();
        $client = Client::count();
        $jobs = Job::count();
        return view('admin.statistics',compact('apps', 'client', 'jobs'));
    }
            
}