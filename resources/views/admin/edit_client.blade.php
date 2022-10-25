<x-admin-layout>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
  <header>
    <h1><strong>Edit Company Info !</strong> </h1> <br><br>
  </header>
  
  
  <form method="post" action="{{ route('admin.client_update') }}" id="myForm" >
    @csrf

    <input type="hidden" name="id"  value="{{ $client->id }}">

    <div class="form-group">
      <label for="name">Company Name:</label>
      <input name="company_name" value=" {{ $client->company_name }}" type="text" class="form-control" style="border:none" id="name" >
    </div>
    <div class="form-group">
      <label for="address">Company Address:</label>
      <input name="company_address" value=" {{ $client->company_address }}" type="text" class="form-control" style="border:none" id="address" >
    </div>
    <div class="form-group">
      <label for="email">Email Address:</label>
      <input name="company_email" value=" {{ $client->company_email }}" type="email" class="form-control" style="border:none" id="email" >
    </div>
    <div class="form-group">
      <label for="mobile no">Mobile Number:</label>
      <input name="company_mobile_no" value=" {{ $client->company_mobile_no }}" type="text" class="form-control" style="border:none" id="company_mobile_no" >
    </div>

    
    <input type="submit" class="btn btn-dark waves-effect waves-light  " style="background: black" value="Edit Company Info" >
    
  </form>
  
  
  <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
              company_name: {
                    required : true,
                }, 
                company_address: {
                    required : true,
                }, 
                company_email: {
                    required : true,
                }, 
                company_mobile_no: {
                    required : true,
                }, 
            },
            messages :{
              company_name: {
                    required : 'Please Enter Company Name',
                },
                company_address: {
                    required : 'Please Enter Company Address',
                },
                company_email: {
                    required : 'Please Enter Company Address',
                },
                company_mobile_no: {
                    required : 'Please Enter Company Mobile Number',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>



</x-admin-layout>
