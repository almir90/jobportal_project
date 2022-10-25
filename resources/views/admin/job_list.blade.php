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
  
            
  
  <h4 class="card-title"><strong>Job List </strong> </h4><br>
  
  
  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <thead  style="background: rgb(76,81,191);
  background: linear-gradient(0deg, rgba(76,81,191,0.9192051820728291) 11%, rgba(76,81,191,1) 33%); color:#e3e6e9;">
  <tr>
      <th>No</th>
      <th style="width: 12%">Company Name</th> 
      <th>Position</th> 
      <th>Type</th> 
      <th>Location</th> 
      <th>Description</th> 
      
  </thead>
  <tbody>
    
    
    
    @foreach($jobs as $key => $job)
    
    @php  
        $name = App\Models\User::where('id', $job->created_by)->pluck('name')->first();
    @endphp

  <tr>
    <td>{{$key + 1 }}.</td>
      <td>{{$name}} </td>
      <td>  {{ $job->job_position }} </td> 
      <td> {{ $job->job_type }} </td> 
      <td> {{ $job->location }} </td> 
      <td> {{ $job->job_description }} </td> 
    
  </tr>
  @endforeach
  
    
    
  </tbody>
  </table>
  
              </div>
          </div>
      </div> <!-- end col -->
  </div> <!-- end row -->
 



</x-admin-layout>
