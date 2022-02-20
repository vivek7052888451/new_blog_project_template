@extends('layouts.backend.app')
@section('title')
<title>{{env('APP_NAME')}} | Dashboard</title>
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">User</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total User</div>
                        <div class="stat-digit"> @empty(!$userCount){{ $userCount }}@endempty</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Post</div>
                        <div class="stat-digit">@empty(!$blogCount){{$blogCount}} @endempty</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text"> Comment</div>
                        <div class="stat-digit">@empty(!$commentCount){{$commentCount}} @endempty</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Like</div>
                        <div class="stat-digit">770</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Total Users</strong>
                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>User Id</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            @isset($totalUsers)
                            <tbody>
                                @foreach($totalUsers as $totalUser)
                                <tr>
                                    <td>{{$totalUser->id}}</td>
                                    <td>{{$totalUser->userid}}</td>
                                    <td>{{$totalUser->name}}</td>
                                    <td>{{$totalUser->email}}</td>
                                    
                                    <td class="text-center">
                                       <a href=""  class="btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_{{$totalUser->id}}"><span data-toggle="tooltip" data-placement="top" title="Edit blog"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                                   </td>
                                   
                               </tr>
                               @endforeach
                           </tbody>
                           @endisset
                       </table>
                   </div>
               </div>
           </div>


       </div>
   </div><!-- .animated -->
</div>

<!------------delete model--------->
@foreach($totalUsers as $totalUser)
<div id="deleteModal_{{$totalUser->id}}" class="modal custom-modal fade " role="dialog">
   <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <form id="deleteModal_{{$totalUser->id}}" class="deleleModelhide">
            
            <div class="modal-body">
                <div class="form-header">
                    <h3>Delete User</h3>
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-3">
                            <button type="button"  class="btn btn-danger continue-btn deleteRecord" data-id="{{$totalUser->id}}">Delete</button>
                            
                        </div>
                        <div class="col-3">
                            <button href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</button>
                        </div>                            
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endforeach
@endsection
@section('custom-script')
<script>
    //delete Blog
    $('.deleteRecord').on('click', function () {           
      var id = $(this).attr('data-id');

      $.ajax({                 
       url: '{{ route("admin.user-delete") }}',
       type : 'POST',  
       data: {
        "_token": "{{ csrf_token() }}",
        "id": id
    },              
    success: function(response)
    {
      
      toastr["success"]("User Delete Successfully");
      location.reload();
  },
  error: function (error) {
    toastr["error"]("Oops! Something Went Wrong ! Try Again <i class=\"fa fa-frown-o\" aria-hidden=\"true\"></i>");
}
});
      
  });
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'lBfrtip',
            buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
</script>
@endsection
