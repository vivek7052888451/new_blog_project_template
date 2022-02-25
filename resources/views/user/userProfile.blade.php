@extends('layouts.backend.app')
@section('title')
 <title>{{env('APP_NAME')}} | Admin Profile</title>
@endsection
@section('content')
<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
              </a>
              <h1>{{$userdata->name ?? 'N/A'}}</h1>
              <p></p>
          </div>

          <ul class="nav nav-pills nav-stacked bg-light mt-2">
          
             
              <li><a href="#" data-toggle="modal" data-target="#edit_{{$userdata->id}}" type="button" > <i class="fa fa-edit"></i> Edit profile</a></li>
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9 ">
      
      <div class="panel mt-5">
          <div class="bio-graph-heading">
            
          </div>
          <div class="panel-body bio-graph-info mt-1 p-2 bg-light">
              <h1>Bio Graph</h1>
              <div class="row">
                  <div class="bio-row">
                      <p><span>First Name </span>:{{ $userdata->name ?? 'N/A' }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Last Name </span>:</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Country </span>:</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Birthday</span>:</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Occupation </span>:</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: {{ $userdata->email ?? 'N/A' }}</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Mobile </span>: </p>
                  </div>
                  <div class="bio-row">
                      <p><span>Phone </span>: </p>
                  </div>
              </div>
          </div>
      </div>
      <div>
        
      </div>
  </div>
</div>
</div>

<!-------edit model--------------->

<!-- Modal -->
  <div class="modal fade" id="edit_{{$userdata->id}}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Profile</h4>
        </div>
        <div class="modal-body">
         <form id="formblog_data">
            @csrf
            <div class="form-group">
            <label for="name">Name:</label>
            <input type="hidden" name="id" name='id' value="{{$userdata->id}}">
            <input type="name" class="form-control" id="name" name="name" value="{{$userdata->name}}">
            </div>
            <div class="form-group">
            <label for="userid">UserId:</label>
            <input type="text" class="form-control" id="userid" name="userid" value="{{$userdata->userid}}">
            </div>
            <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$userdata->email}}">
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success profile_add_btn">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
        </form>
        </div>
        
      </div>
      
    </div>
  </div>

@endsection
@section('custom-script')
<link rel="stylesheet" type="text/css" href="{{asset('backend/assets/css/custom.css')}}">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>

if ($("#formblog_data").length > 0) {
$("#formblog_data").validate({
rules: {
name: {
required: true,

},
userid: {
required: true,

},  
email: {
required: true,

},   
},
messages: {
name: {
required: "Please enter name",

},
userid: {
required: "Please enter userid",

},   
email: {
required: "Please enter valid email",

},
},
 submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                 //  $('.blog_add_btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Blog Added..');
                 // $('.blog_add_btn').prop('disabled', true);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("user.update-profile") }}',

                    
                    data: new FormData($("#formblog_data")[0]),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                         toastr["success"]("Update Profile Successfully");
                        document.getElementById("formblog_data").reset();
                         $('.profile_add_btn').html('Updated');
                         $('.profile_add_btn').prop('disabled', false);

                        location.reload();    
                    },
                    error: function (error) {
                        toastr["error"]("Oops! Something Went Wrong ! Try Again <i class=\"fa fa-frown-o\" aria-hidden=\"true\"></i>");
                    }
                });
            }
})
}
</script>

@endsection