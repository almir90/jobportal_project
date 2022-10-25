<x-admin-layout>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
  <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            

             

        </div>
    </div>
</div>
<!-- end page title -->
<div class="container">
<div style="margin-top: 5%" class="row">

  <div class="col-xl-3 col-md-6">
<div class="card bg-primary text-white mb-4">
  <div class="card-body">
    Total Job Posts
    <h1 style="font-size: 30px">{{$jobs}}</h1>
  </div>
  <div class="card-footer d-flex align-items-center justify-content-between" >
    <a class="small text-white streched-link" href="/admin/job/list">View Details</a>
    <div class="small text-white" ></div>

  </div>
</div>

</div>

<div class="col-xl-3 col-md-6">
<div class="card bg-info text-white mb-4">
  <div class="card-body">
    Total Job Applications
    <h1 style="font-size: 30px">{{$apps}}</h1>
  </div>
  <div class="card-footer d-flex align-items-center justify-content-between" >
    <a class="small text-white streched-link" href="/admin/job/applications">View Details</a>
    <div class="small text-white" ></div>

  </div>
</div>

</div>

<div class="col-xl-3 col-md-6">
<div class="card bg-warning text-white mb-4">
  <div class="card-body">
    Total Clients
    <h1 style="font-size: 30px">{{$client}}</h1>
  </div>
  <div class="card-footer d-flex align-items-center justify-content-between" >
    <a class="small text-white streched-link" href="/admin/client/list">View Details</a>
    

  </div>
</div>


</div>

</div>
</div>

</x-admin-layout>
