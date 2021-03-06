<div class="page-wrapper chiller-theme toggled">
<a id="show-sidebar" class="btn btn-sm btn-dark-blue" href="#" style="z-index:2; margin-top:80px;">
<i data-feather="align-justify"></i>
</a>
<nav id="sidebar" class="sidebar-wrapper">
<div class="sidebar-content">
  <div class="sidebar-brand">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('logo-final4.png') }}" alt="">
    </a>
    <div id="close-sidebar">
      <i data-feather="x-circle"></i>
    </div>
  </div>
  <div class="sidebar-header">
    <div class="user-info">
      <span class="user-name">{{ Auth::user()->name }}
      </span>
      <span class="user-role">Administrator</span>
      <span class="user-status">
        <i class="fa fa-circle"></i>
        <span>Online</span>
      </span>
    </div>
  </div>
  <div class="sidebar-menu">
    <ul>
      <li class="header-menu">
        <span>General</span>
      </li>
      <li>
        <a href="{{url('admin-dashboard')}}">
          <i data-feather="home"></i>
          <span>Admin Dashboard</span>
        </a>
      </li>
      <hr>

      <li>
        <a href="{{url('create-client')}}">
           <i data-feather="user-plus"></i>  <span> Create Clients</span>
        </a>
      </li>
      <hr>

      <li>
        <a href="{{url('home')}}">
            <i data-feather="users"></i> <span> Manage Clients</span>
        </a>
      </li>
      <hr>

      <li>
        <a href="{{url('settings')}}">
            <i data-feather="settings"></i> <span>Admin Settings</span>
        </a>
      </li>
      <hr>

      <li>
        <a href="{{url('latest-news')}}">
            <i data-feather="alert-circle"></i> <span>Latest News</span>
        </a>
      </li>
      <hr>

      <li>
        <a href="{{url('email-support')}}">
            <i data-feather="mail"></i> <span>Email Support Ticket</span>
        </a>
      </li>
      <hr>


    </ul>
  </div>
  <!-- sidebar-menu  -->
</div>
</nav>
</div>
