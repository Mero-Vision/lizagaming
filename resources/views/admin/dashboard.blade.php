<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:title" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:description" content="Zenix - Crypto Admin Dashboard">
    <meta property="og:image" content="https://zenix.dexignzone.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <title>Zenix - Crypto Admin Dashboard </title>


    <!-- Page Level CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/chartist.min.css') }}">
    <link href="{{ url('assets/css/owl.carousel.css') }}" rel="stylesheet">
    <!-- End Page Level CSS -->

    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/img/favicon.png') }}">
    <link href="{{ url('assets/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link class="main-css" href="{{ url('assets/css/style.css') }}" rel="stylesheet">








</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

       @include('layouts.navheader')

        @include('layouts.chat')

        @include('layouts.nav')

        @include('layouts.sidenav')

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <h1>Dashboard</h1>
                
                
                
                
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->










    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    @include('layouts.footer')



</body>

</html>
