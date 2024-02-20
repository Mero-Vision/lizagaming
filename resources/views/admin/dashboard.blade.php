<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.header')
    @livewireStyles()












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


    @livewireScripts()
    @include('layouts.footer')
    
<script>
    function setActiveUser(userId) {
        Livewire.emit('chat', userId);
    }
</script>



</body>

</html>
