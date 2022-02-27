@extends('layouts.backend.app')
@section('title')
<title>{{env('APP_NAME')}} |  User Dashboard</title>
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
                            <a class="allComment" href="JavaScript:Void(0);"><div class="stat-content dib">
                                <div class="stat-text">Comment</div>
                                <div class="stat-digit">{{$userComments ?? '0'}} </div>
                            </div></a>
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
                                <div class="stat-text">Total View</div>
                                <div class="stat-digit"></div>
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
                                <div class="stat-digit">{{$userLikes ?? '0'}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


         <div class="content mt-3 commentshow" style="display:none;">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                             <span>User Comment</span> 
                            </div>
                            <div class="card-body">

                            <table id="example" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                   
                                    <th>Image</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            
                           <tbody id="display_result">
                            
                           </tbody>
                          
                       
                        </table>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div>

@endsection
@section('custom-script')
<script>
   
        
        $('.allComment').on('click',function(){
                $.ajax({                 
                     url: '{{ route("user.userComment") }}',
                    type : 'get',
                      dataType: 'html',
                      contentType: false,
                      processData:false,  
                               
                success: function(response)
                {  
                      $('.commentshow').show();
                       $('#display_result').html(response);
                },
                error: function (error) {
                        // toastr["error"]("Oops! Something Went Wrong ! Try Again <i class=\"fa fa-frown-o\" aria-hidden=\"true\"></i>");
                    }
            });
        })
</script>
@endsection