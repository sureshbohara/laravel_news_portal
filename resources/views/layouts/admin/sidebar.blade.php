<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
<div class="sidebar-brand d-none d-md-flex">
<svg class="sidebar-brand-full" width="100%" height="50" alt="Logo">
  <img src="{{asset('admin/logo.jpg')}}" alt="logo" width="100%">
</svg>
</div>
<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">

<li class="nav-item active">
   <a class="nav-link" href="{{route('dashboard')}}">
    <svg class="nav-icon">
      <i class="fa fa-dashboard"></i>
    </svg> Dashboard
  </a>
 </li>

<li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
    <svg class="nav-icon">
    <i class="fa fa-folder"></i>
    </svg>Manage News</a>
  <ul class="nav-group-items">

    @if(Auth::guard('admin')->user()->role_id != '4')
     <li class="nav-item">
      <a class="nav-link" href="{{route('category.index')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> News Category</a>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="{{route('tags.index')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> News Tags</a>
      </li>

      @endif

     <li class="nav-item"><a class="nav-link" href="{{route('news.index')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Your Post News</a>
     </li>

    @if(Auth::guard('admin')->user()->role_id != '4')
      <li class="nav-item"><a class="nav-link" href="{{route('news.all')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> All News</a>
      </li>


       <li class="nav-item"><a class="nav-link" href="{{route('news.archive')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Archive News</a>
      </li>
   @endif

  </ul>
</li>




  <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
    <svg class="nav-icon">
      <i class="fa fa-folder"></i>
    </svg> Blogs</a>
   <ul class="nav-group-items">

    <li class="nav-item"><a class="nav-link" href="{{route('bcategory.index')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Blogs Category</a>
      </li>
     <li class="nav-item"><a class="nav-link" href="{{route('blogs.index')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Blogs Post</a>
      </li>

  </ul>
 </li>



 <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
    <svg class="nav-icon">
      <i class="fa fa-list-alt"></i>
    </svg> Poll</a>
   <ul class="nav-group-items">
    <li class="nav-item"><a class="nav-link" href="{{route('poll.index')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
      </svg> Poll List</a>
    </li>


  </ul>
 </li>

  @if(Auth::guard('admin')->user()->role_id != '4')
  <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
    <svg class="nav-icon">
      <i class="fa fa-envelope"></i>
    </svg> Messaging</a>
   <ul class="nav-group-items">
    <li class="nav-item">
      <a class="nav-link" href="login.html" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Newsletter</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="login.html" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Contact Message</a>
    </li>
  </ul>
 </li>

 <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
    <svg class="nav-icon">
      <i class="fa fa-bullhorn"></i>
    </svg> Advertisement</a>
   <ul class="nav-group-items">
    <li class="nav-item">
      <a class="nav-link" href="{{route('advertisement.index')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Add Advertisement</a>
    </li>
  </ul>
 </li>

 <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
    <svg class="nav-icon">
      <i class="fa fa-users"></i>
    </svg> Users Setting</a>
   <ul class="nav-group-items">
     @isset(auth()->guard('admin')->user()->role->permission['permission']['user']['view'])
     <li class="nav-item">
      <a class="nav-link" href="{{route('user.index')}}">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Manage User</a>
    </li>
     @endisset
   @isset(auth()->guard('admin')->user()->role->permission['permission']['role']['view'])
    <li class="nav-item">
      <a class="nav-link" href="{{route('role.index')}}">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Manage Role</a>
    </li>
     @endisset
     @isset(auth()->guard('admin')->user()->role->permission['permission']['permission']['view'])
    <li class="nav-item">
      <a class="nav-link" href="{{route('permission.index')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Manage Permission</a>
    </li>
     @endisset
  </ul>
 </li>

 <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
    <svg class="nav-icon">
      <i class="fa fa-folder"></i>
    </svg>Manage Reporter</a>
  <ul class="nav-group-items">

    <li class="nav-item">
      <a class="nav-link" href="{{route('reporter')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> News Reporter</a></li>
  </ul>
</li>

 <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
    <svg class="nav-icon">
      <i class="fa fa-file"></i>
    </svg>Manage Pages</a>
  <ul class="nav-group-items">

    <li class="nav-item">
      <a class="nav-link" href="{{route('pages.index')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> CMS Pages</a></li>

  </ul>
</li>


  <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
    <svg class="nav-icon">
      <i class="fa fa-desktop"></i>
    </svg> Frontend Setting</a>
   <ul class="nav-group-items">
    <li class="nav-item">
      <a class="nav-link" href="{{route('general.setting')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> General Settings</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('setting.address')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Address setting</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('setting.smtp')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> SMTP Settings </a>
    </li>

     <li class="nav-item">
      <a class="nav-link" href="{{route('setting.social')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg>Social setting </a>
     </li>


      <li class="nav-item">
      <a class="nav-link" href="{{route('setting.team')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg>Team setting </a>
     </li>

       <li class="nav-item">
      <a class="nav-link" href="{{route('cookie.setting')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg>Cookie & Popup setting </a>
     </li>

      <li class="nav-item">
      <a class="nav-link" href="{{route('cube.setting')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg>Cube Adv setting </a>
     </li>


     <li class="nav-item">
      <a class="nav-link" href="{{route('setting.seo')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg>Default Seo setting </a>
     </li>
  </ul>
 </li>

 <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
    <svg class="nav-icon">
      <i class="fa fa-database"></i>
    </svg>System Backup</a>
  <ul class="nav-group-items">

    <li class="nav-item">
      <a class="nav-link" href="{{route('system.backup')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> System Backup</a>
    </li>

     <li class="nav-item">
      <a class="nav-link" href="{{route('database.backup')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Database Backup</a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('sitemap.index')}}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Sitemap</a>
    </li>

     <li class="nav-item">
      <a class="nav-link" href="{{ route('cache.clear') }}" target="_top">
        <svg class="nav-icon">
          <i class="fa fa-plus" aria-hidden="true"></i>
        </svg> Cache Clear</a>
    </li>

  </ul>
</li>

@endif


</ul>
</div>