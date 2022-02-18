@extends('layouts.backend.app')
@section('title')
 <title>{{env('APP_NAME')}} | Add Blog</title>
@endsection
@section('content')

  
<!--model add Blog--->
  
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
                            <div class="stat-content dib">
                                <div class="stat-text">Total User</div>
                                <div class="stat-digit">@empty(!$userCount){{ $userCount }}@endempty</div>
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
     <div class="modal fade showblog" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Blog Model</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="card-body card-block">
                        <form action="" id="formblog_data" enctype="multipart/form-data" class="form-horizontal" name="blog_form">
                            @csrf

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Category</label></div>
                                    <div class="col-12 col-md-9">
                                      <select class="form-control" name="category_id">
                                            <option>---Select Category---</option>
                                            @isset($categorys)
                                            @foreach($categorys as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                            @endisset
                                        </select>  
                                 </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Title" class="form-control">
                                        

                                    </div>
                                </div>
                               
                             

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Discription</label></div>
                                    <div class="col-12 col-md-9">
                                   <textarea class="summernote" name="discription"></textarea></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
                                </div>
                                 <div class="modal-footer">
                                      <button type="submit" class="btn btn-success blog_add_btn">Save</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                  
                                </div>
                               
                            </form>
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
                                 <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#staticModal">
                                 Add Blog
                                </button>

                               
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
                            
                           <tbody>
                             @isset($blogs)
                            @foreach($blogs as $blog)
                                  <tr>
                                    <td>{{$blog->id}}</td>
                                    <td>{{$blog->title}}</td>
                                   
                                    
                                    <td><img src="/backend/images/uploads/{{$blog->image}}" width="50px"></td>
                                    <td>
                                     <a href=""  class="btn-sm btn-primary text-center" data-toggle="modal" data-target="#deleteModal_{{$blog->id}}"><span data-toggle="tooltip" data-placement="top" title="Edit blog"><i class="fa fa-trash" aria-hidden="true"></i></span></a>

                                      <a href=""  class="btn-sm btn-danger text-center" data-toggle="modal" data-target="#view_{{$blog->id}}"><span data-toggle="tooltip" data-placement="top" title="View Blog"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                                       <a href=""  class="btn-sm btn-info text-center" data-toggle="modal" data-target="#edit_{{$blog->id}}"><span data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>

                                    </td>


                                </tr>
                                @endforeach
                                 @endisset
                           </tbody>
                          
                       
                        </table>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div><!-- .animated -->
        </div>
         <!----------delete models----------->
       @foreach($blogs as $blog)
          <div id="deleteModal_{{$blog->id}}" class="modal custom-modal fade " role="dialog">
             <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="deleteModal_{{$blog->id}}" class="deleleModelhide">
                    
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete BLog</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                                <div class="row">
                                <div class="col-3"></div>
                                    <div class="col-3">
                                    <button type="button"  class="btn btn-danger continue-btn deleteRecord" data-id="{{$blog->id}}">Delete</button>
                                    
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

        <!------------edit model------------->
        <div class="modal fade kk" id="edit_{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static" >
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Edit Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="card-body card-block">
                        <form action="" id="editblog_{{$blog->id}}" class="editblog" enctype="multipart/form-data" class="form-horizontal" name="">
                       
                            @csrf

                              
                                <div class="row form-group">
                                    <input type="hidden" name="id" value="{{$blog->id}}"/>
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="title"value="{{$blog->title}}" placeholder="Title" class="form-control"></div>
                                </div>
                             
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Discription</label></div>
                                    <div class="col-12 col-md-9"><textarea name="discription" id="textarea-input"placeholder="Discription...." class="form-control">{{$blog->discription}}</textarea></div>
                                </div>
                                 <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"></div>
                                    <img src="/backend/images/uploads/{{$blog->image}}" width="100px" />
                                    
                                </div>
                                 <div class="modal-footer">
                                      <button type="button" class="btn btn-success blog_update" data-id="{{ $blog->id }}">Update</button>
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                  
                                </div>
                               
                            </form>
                        </div>
                                                 
                                               
                    </div>
                   
                </div>
            </div>
        </div>

        <!---view Model-------------->

        <div class="modal fade" id="view_{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">View Blog</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                 <th>Title</th>
                                  <th>Discription</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td> {{$blog->id}}</td>
                                <td> {{$blog->title}}</td>
                                <td> {!! $blog->discription !!}</td>
                            </tr>
                        </tbody>
                    </table>
                   
                  
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection

@section('custom-script')

 
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<!--- summernote--------->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>




<script>

if ($("#formblog_data").length > 0) {
$("#formblog_data").validate({
rules: {
title: {
required: true,

},
discription: {
required: true,

},  
image: {
required: true,

},   
},
messages: {
title: {
required: "Please enter name",

},
discription: {
required: "Please enter valid email",

},   
image: {
required: "Please enter message",

},
},
 submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                  $('.blog_add_btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Blog Added..');
                 $('.blog_add_btn').prop('disabled', true);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.blog-add") }}',

                    
                    data: new FormData($("#formblog_data")[0]),
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function (response) {
                         toastr["success"]("Blog Post Successfully");
                        document.getElementById("formblog_data").reset();
                         $('.blog_add_btn').html('Submit');
                         $('.blog_add_btn').prop('disabled', false);

                        location.reload();    
                    },
                    error: function (error) {
                        toastr["error"]("Oops! Something Went Wrong ! Try Again <i class=\"fa fa-frown-o\" aria-hidden=\"true\"></i>");
                    }
                });
            }
})
}

//delete Blog
$('.deleteRecord').on('click', function () {           
      var id = $(this).attr('data-id');        
       $.ajax({                 
             url: '{{ route("admin.blog-delete") }}',
            type : 'POST',  
          data: {
        "_token": "{{ csrf_token() }}",
        "id": id
        },              
        success: function(response)
        {
          
          toastr["success"]("Blog Delete Successfully");
            location.reload();
        },
        error: function (error) {
                toastr["error"]("Oops! Something Went Wrong ! Try Again <i class=\"fa fa-frown-o\" aria-hidden=\"true\"></i>");
            }
    });
      
});

       $('.blog_update').on('click', function () {         
              $id = $(this).attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: '{{ route("admin.blog-update") }}',

                     data: new FormData($('#editblog_'+$id)[0]),
                     
                    
                    dataType: 'json',
                    async: false,
                    processData: false,
                    contentType: false,
                    success: function (response) { 
                      toastr["success"]("Blog Update Successfully");
                        // document.getElementById("editblog_"+$id).reset();
                         $('.kk').modal('hide');
                     
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

    <script type="text/javascript">
        $(document).ready(function() {
          $('.summernote').summernote();
        });
    </script>


   
@endsection
