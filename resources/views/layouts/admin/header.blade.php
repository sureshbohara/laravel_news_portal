 <?php 
    $greetings = "";
    $time = date("H");
    $timezone = date("e");
     if ($time < "12") {
        $greetings = "Good Morning";
     } else
     if ($time >= "12" && $time < "17") {
        $greetings = "Good Afternoon";
     } else
     if ($time >= "17" && $time < "19") {
        $greetings = "Good Evening";
     } else
     if ($time >= "19") {
        $greetings = "Good Night";
     }

 ?>


 <header class="header header-sticky">
        <div class="container-fluid">
          <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
              <i class="fa fa-list"></i>
            </svg>

          </button>

          <ul class="header-nav d-none d-md-flex">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <marquee width="100%" direction="left">
                  Hi {{Auth::guard('admin')->user()->name}}  ! {{ $greetings }} , Welcome To Taraikhabar.
                  </marquee>
                </a>
              </li>
          </ul>

          <ul class="header-nav ms-3">

            <li>
              <div class="lang-selected" style="margin-top:10px;">
                <a href="{{url('/')}}" target="_blank" class="btn btn-default">
                    Visit Home Page
                 </a>
              </div>
            </li>
               &nbsp;&nbsp;&nbsp;
            <li>
              <div class="lang-selected" style="margin-top:10px;">
                <a href="" class="btn btn-default">
                    Welcome {{Auth::guard('admin')->user()->name}}
                 </a>
              </div>
            </li>

            <li class="nav-item dropdown">

              

              <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">


                <div class="avatar avatar-md">
                  @if(!empty($user['image']))
                  <img class="avatar-img" src="{{asset('/images/user/',Auth::guard('admin')->user()->image)}}" alt="Taraikhabar">
                  @else
                  <img class="avatar-img" src="{{asset('images/icon.png')}}" alt="Tarai Khabar">
                  @endif

                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header bg-light py-2">
                  <div class="fw-semibold">User Settings</div>
                </div>
                <a class="dropdown-item" href="{{route('update.profile')}}">
                  <svg class="icon me-2">
                    <i class="fa fa-user"></i>
                  </svg> Update Profile
                </a>

                  <a class="dropdown-item" href="{{route('change.admin.password')}}">
                  <svg class="icon me-2">
                    <i class="fa fa-key" aria-hidden="true"></i>
                  </svg> Change Password
                 </a>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{route('admin.logout')}}">
                  <svg class="icon me-2">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                  </svg> Logout</a>
              </div>
            </li>
          </ul>
        </div>
        
      </header>