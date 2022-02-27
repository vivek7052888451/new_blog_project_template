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
                            <li class="active">Dashboard</li>
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
                           <a class="alluser" href="JavaScript:Void(0);"><div class="stat-content dib">
                                <div class="stat-text">Total User</div>
                                <div class="stat-digit">{{ $userCount ?? '0' }}</div>
                            </div></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                           <a class="totalblog" href="JavaScript:Void(0);"> <div class="stat-content dib">
                                <div class="stat-text">Total Post</div>
                                <div class="stat-digit">{{$blogCount ?? '0'}}</div>
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
                             <a class="totalcomment" href="JavaScript:Void(0);"><div class="stat-content dib">
                                <div class="stat-text"> Comment</div>
                                <div class="stat-digit">{{$commentCount ?? '0'}}</div>
                            </div></a>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                           <a class="totallike" href="JavaScript:Void(0);"> <div class="stat-content dib">
                                <div class="stat-text">Total Like</div>
                                <div class="stat-digit">{{$likeCount ?? '0'}}</div>
                            </div></a>
                        </div>
                    </div>
                </div>
            </div>


        </div>

         <div class="content mt-3" style="display:none;" id="usertable">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">User Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>User Id</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>User Mobile</th>
                                          
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
        <!----Total comment------------->
         <div class="content mt-3" style="display:none;" id="commenttable">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Comment Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Id</th>
                                            <th>User Name</th>
                                            <th>User Email</th>
                                            <th>User Comment</th>
                                            <th>Blog Id</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="display_comment">
                                     
                                    </tbody>
                                  
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>

         <!----Total comment------------->
         <div class="content mt-3" style="display:none;" id="blogtable">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">BLog Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="example3" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Id</th>
                                            <th>Title</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="display_blog">
                                     
                                    </tbody>
                                  
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div>

         <!----Total comment------------->
         <div class="content mt-3" style="display:none;" id="liketable">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Like Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="example4" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User Id</th>
                                            <th>User Name</th>
                                            <th>Blog Id</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody id="display_like">
                                     
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

    $('.alluser').on('click',function(){
        $.ajax({                 
             url: '{{ route("admin.total-user") }}',
            type : 'get',
               cache: false,
            dataType: 'json', 
                       
        success: function(response)
        {  
              $('#usertable').show();
                
               $('#display_result').html(response);
        },
        error: function (error) {
                // toastr["error"]("Oops! Something Went Wrong ! Try Again <i class=\"fa fa-frown-o\" aria-hidden=\"true\"></i>");
            }
    });
    })
</script>

<script>

    $('.totalcomment').on('click',function(){
        $.ajax({                 
             url: '{{ route("admin.total-comment") }}',
            type : 'get',
               cache: false,
            dataType: 'json', 
                       
        success: function(response)
        {  
              $('#commenttable').show();
                
               $('#display_comment').html(response);
        },
        error: function (error) {
                // toastr["error"]("Oops! Something Went Wrong ! Try Again <i class=\"fa fa-frown-o\" aria-hidden=\"true\"></i>");
            }
    });
    })
</script>

<script>

    $('.totalblog').on('click',function(){
        $.ajax({                 
             url: '{{ route("admin.total-blog") }}',
            type : 'get',
               cache: false,
            dataType: 'json', 
                       
        success: function(response)
        {  
              $('#blogtable').show();
                
               $('#display_blog').html(response);
        },
        error: function (error) {
                // toastr["error"]("Oops! Something Went Wrong ! Try Again <i class=\"fa fa-frown-o\" aria-hidden=\"true\"></i>");
            }
    });
    })
</script>

<script>

    $('.totallike').on('click',function(){
        $.ajax({                 
             url: '{{ route("admin.total-like") }}',
            type : 'get',
               cache: false,
            dataType: 'json', 
                       
        success: function(response)
        {  
              $('#liketable').show();
                
               $('#display_like').html(response);
        },
        error: function (error) {
                // toastr["error"]("Oops! Something Went Wrong ! Try Again <i class=\"fa fa-frown-o\" aria-hidden=\"true\"></i>");
            }
    });
    })
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
<script>
$(document).ready(function() {
    $('#example2').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#example3').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<script>
$(document).ready(function() {
    $('#example4').DataTable( {
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endsection
