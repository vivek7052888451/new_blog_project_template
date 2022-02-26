 <!DOCTYPE html>
<html lang="zxx" class="no-js">
<meta name="csrf-token" content="{{ csrf_token() }}">
@yield('title')
<!-- Mirrored from preview.colorlib.com/theme/blogger/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Feb 2022 07:18:29 GMT -->
<head>
@include('layouts.forntend.include.headerlink')
</head>
<body>


@include('layouts.forntend.include.header')

@yield('content')



@include('layouts.forntend.include.footer')


@include('layouts.forntend.include.footerlink')

@yield('custom')
</body>

<!-- Mirrored from preview.colorlib.com/theme/blogger/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 18 Feb 2022 07:18:45 GMT -->
</html>