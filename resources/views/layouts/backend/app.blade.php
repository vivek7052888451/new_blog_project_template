
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
@yield('title')
<!--<![endif]-->

<head>

<meta name="csrf-token" content="{{ csrf_token() }}">

@include('layouts.backend.includes.headerlink')
<style>
    form .error {
  color: #ff0000;
}
    </style>
</head>

<body>



    <!-- Left Panel -->
    @include('layouts.backend.includes.sidebar')
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('layouts.backend.includes.header')
        <!-- /header -->
        <!-- Header-->

       
       @yield('content')
       <!-- .content -->


    </div><!-- /#right-panel -->
     
    <!-- Right Panel -->

   @include('layouts.backend.includes.footerlink')
 @yield('custom-script')
</body>

</html>
