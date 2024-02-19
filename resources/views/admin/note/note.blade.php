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
    <title>Liza Gaming</title>
    @include('layouts.header')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>












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
                            <h4 class="card-title mb-2">Game Notes</h4>
                            <span>Note Management</span>
                        </div>

                        <a href="javascript:void(0);" class="btn btn-info" data-bs-toggle="modal"
                            data-bs-target="#myModal">+ Add New Note</a>
                    </div>

                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Add New Note</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="{{ url('admin/notes') }}" method="POST" id="noteForm">
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mb-3 mt-3">
                                                    <label class="text-black font-w600 form-label">Title <span
                                                            class="required">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Eg: Note Title" name="title">
                                                </div>


                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3 mt-3">
                                                    <style>
                                                        .custom-trix-editor {
                                                            min-height: 200px;

                                                        }
                                                    </style>

                                                    <input id="x" type="hidden" name="note">
                                                    <trix-editor input="x"
                                                        class="custom-trix-editor"></trix-editor>

                                                </div>

                                            </div>






                                        </div>
                                        <button class="btn btn-primary">Save</button>





                                    </form>
                                </div>



                            </div>
                        </div>
                    </div>






                    <!-- Modal -->
                    <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog"
                        aria-labelledby="addContactModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title fs-20">Add Contact</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <i class="flaticon-cancel-12 close" data-bs-dismiss="modal"></i>
                                    <div class="add-contact-box">
                                        <div class="add-contact-content">
                                            <form id="addContactModalTitle">
                                                <div class="image-placeholder">
                                                    <div class="avatar-edit">
                                                        <input type="file" id="imageUpload"
                                                            accept=".png, .jpg, .jpeg">
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview"
                                                            style="background-image: url('images/contacts/user.jpg');">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-black font-w500">Name</label>
                                                    <div class="contact-name">
                                                        <input type="text" id="c-name" class="form-control"
                                                            placeholder="Name">
                                                        <span class="validation-text"></span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-black font-w500">Occupation</label>
                                                    <div class="contact-occupation">
                                                        <input type="text" id="c-occupation" class="form-control"
                                                            placeholder="Occupation">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button id="btn-edit" class="float-left btn btn-primary">Save</button>

                                    <button class="btn btn-danger" data-bs-dismiss="modal"> <i
                                            class="flaticon-delete-1"></i> Discard</button>

                                    <button id="btn-add" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>































                    <br>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navpills-1">
                            <div class="row dz-scroll  loadmore-content searchable-items list"
                                id="allContactListContent">
                                @forelse ($notes as $data)
                                    <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-6 col-sm-6 items">
                                        <div class="card contact-bx item-content shadow">
                                            <div class="card-header border-1">
                                                <div class="action-dropdown">
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                                                    stroke="#575757" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                                <path
                                                                    d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                                                    stroke="#575757" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                                <path
                                                                    d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                                                    stroke="#575757" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item edit"
                                                                href="javascript:void(0);">Edit</a>
                                                            <a class="dropdown-item delete"
                                                                href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body user-profile">

                                                <div class="media-body user-meta-info">
                                                    <h6 class="fs-20 font-w500 my-1"><a href="#"
                                                            class="text-black user-name"
                                                            data-name="{{ $data->title }}">{{ $data->title }}</a>
                                                    </h6>
                                                    <p class="mb-3  text-dark" data-occupation="{!! $data->note !!}">
                                                        {!! $data->note !!}</p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty

                                    <img src="{{ url('assets/img/Empty-rafiki.png') }}"
                                        class="img-fluid d-block mx-auto" style="max-width: 300px" />
                                @endforelse
                            </div>
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
    <script src="{{ url('assets/js/ckeditor.js') }}"></script>
   





</body>

</html>
