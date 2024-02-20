<!--**********************************
            Sidebar start
        ***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
        <div class="main-profile">
            <div class="image-bx">
                <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" alt="">
                <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
            </div>
            <h5 class="name"><span class="font-w400">Hello,</span> {{ auth()->user()->name }}</h5>
            <p class="email">{{ auth()->user()->email }}</p>
        </div>
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>

            <li><a href="{{ url('admin/dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

           
            <li><a class="has-arrow ai-icon" href="javascript:void()">
                    <i class="flaticon-028-user-1"></i>
                    <span class="nav-text">Customers</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/customers') }}">Create Customer</a></li>
                    <li><a href="{{ url('admin/game-password-management') }}">View Customers</a></li>
                   


                </ul>
            </li>

            <li class="nav-label">Apps</li>
            <li><a class="has-arrow ai-icon" href="javascript:void()">
                    <i class="flaticon-077-menu-1"></i>
                    <span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ url('admin/password-management') }}">Password Management</a></li>
                    <li><a href="{{ url('admin/game-password-management') }}">Game Password Management</a></li>
                    <li><a href="{{ url('admin/notes') }}">Notes</a></li>


                </ul>
            </li>








        </ul>

    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->
