<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.header')












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

        <div class="content-body">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-sm-flex d-block">
                        <div class="me-auto mb-sm-0 mb-3">
                            <h4 class="card-title mb-2">Passwords Listing</h4>
                            <span>Password Management</span>
                        </div>

                        <a href="javascript:void(0);" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#myModal">+ Add Password</a>
                    </div>

                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Password</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{ url('admin/password-management') }}" method="POST">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3 mt-3">
                                                    <label class="text-black font-w600 form-label">Name <span
                                                            class="required">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Eg: Gmail"
                                                        name="name">
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 mt-3">
                                                    <label class="text-black font-w600 form-label">URL <span
                                                            class="required">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Eg: gmail.com" name="url">
                                                </div>

                                            </div>


                                            <div class="col-md-6">
                                                <div class="mb-3 mt-3">
                                                    <label class="text-black font-w600 form-label">Email/Username <span
                                                            class="required">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Eg: hello@gmail.com" name="email">
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3 mt-3">
                                                    <label class="text-black font-w600 form-label">Password <span
                                                            class="required">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Eg: Password@720" name="password">
                                                </div>

                                            </div>



                                        </div>
                                        <button class="btn btn-primary">Save</button>





                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>




                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table style-1" id="example">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email/Username</th>
                                        <th>Password</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($passwords as $data)
                                        <tr>
                                            <td>
                                                <h6>{{ $data->id }}.</h6>
                                            </td>
                                            <td>
                                                <div class="media style-1">
                                                    <img src="{{ Avatar::create($data->name)->toBase64() }}"
                                                        class="img-fluid me-3" alt="">
                                                    <div class="media-body">
                                                        <h6>{{ $data->name }}</h6>
                                                        <span>{{ $data->url }}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    <h6>{{ $data->email }}</h6>

                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <h6>{{ $data->password }}</h6>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex action-button">
                                                    {{-- <a href="javascript:void(0);"
                                                        class="btn btn-info btn-xs light px-2">
                                                        <svg width="20" height="20" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z"
                                                                stroke="#fff" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </a> --}}
                                                    <a href="{{url('admin/password-management')}}/{{$data->id}}"
                                                        class="ms-2 btn btn-xs px-2 light btn-danger">
                                                        <svg width="20" height="20" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M3 6H5H21" stroke="#fff" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path
                                                                d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z"
                                                                stroke="#fff" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>

                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <img src="{{ url('assets/img/Empty-rafiki.png') }}"
                                                    class="img-fluid d-block mx-auto" style="max-width: 300px" />
                                            </td>
                                        </tr>
                                    @endforelse









                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
