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

          

<h4 class="card-title"><strong>List Of Clients </strong> </h4><br>


<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
<thead  style="background: rgb(76,81,191);
background: linear-gradient(0deg, rgba(76,81,191,0.9192051820728291) 11%, rgba(76,81,191,1) 33%); color:#e3e6e9;">
<tr>
    
    <th style="width: 3%">No</th> 
    <th>Name</th> 
    <th>Address</th> 
    <th>Email</th> 
    <th>Mobile</th> 
    
    <th style="width: 12%">Action</th>
    
</thead>


<tbody>
   
  @foreach($clients as $key=> $client)
<tr>
    <td> {{ $key+1}}. </td>
    <td>  {{ $client->company_name }} </td> 
    <td> {{ $client->company_address }} </td> 
    <td> {{ $client->company_email }} </td> 
    <td> {{ $client->company_mobile_no }} </td> 
     
 
    
    <td>
      <a href="{{ route('admin.edit_client', $client->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
   
        <a href="{{ route('admin.delete_client', $client->id) }}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fa fa-trash-o" aria-hidden="true"></i></i></i> </a>
   
                               </td>
   
</tr>
@endforeach

</tbody>
</table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
 



</x-admin-layout>
