<x-admin-layout>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
  <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            

             

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
  <div class="col-12">
  <div class="card">
  <div class="card-body">
  
            
  
  <h4 class="card-title"><strong>Job Applications </strong> </h4><br>
  
  
  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <thead>
  <tr  style="background: rgb(76,81,191);
  background: linear-gradient(0deg, rgba(76,81,191,0.9192051820728291) 11%, rgba(76,81,191,1) 33%); color:#e3e6e9;">
      <th style="width:4%">No</th>
      <th>Company Name</th> 
      <th>Job Position</th> 
      <th>First Name</th> 
      <th>Last Name</th> 
      <th>Email</th> 
      
      
  </thead>
  <tbody>
  
    
    
    @foreach($all_apps as $key => $app)
    
    @php  
        
        $job_position = App\Models\Job::where('id', $app->job_id )->pluck('job_position')->first();
        $created_by = App\Models\Job::where('id', $app->job_id)->pluck('created_by')->first();
        $company_name = App\Models\User::where('id', $created_by)->pluck('name')->first();

    @endphp

  <tr>
    <td>{{$key+1}}.</td>
      <td>{{$company_name}}</td>
      <td>{{$job_position}}</td>

      <td>  {{ $app->first_name }} </td> 
      <td> {{ $app->last_name }} </td> 
      <td> {{ $app->email }} </td> 
       
    
  </tr>
  @endforeach
  
    
    
  </tbody>
  </table>
  
              </div>
          </div>
      </div> <!-- end col -->
  </div> <!-- end row -->
 



</x-admin-layout>
