<div class="page-wrapper chiller-theme toggled">
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div id="toggle-sidebar">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="sidebar-header" style="margin-top:60px;">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="{{ asset('user.png') }}" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                          {{ Auth::user()->name }}
                        </span>
                        <span class="user-role">User</span>
                        <span class="user-status">
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <!-- <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <hr>
                        <li class="sidebar-dropdown">
                            <a href="{{url('home')}}">
                                <i data-feather="grid"></i> <span> Dashboard</span>
                            </a>
                        </li>
                        <hr>
                        <li class="sidebar-dropdown">
                            <a href="{{url('stocks')}}">
                              <i data-feather="trending-up"></i> <span>My Stocks</span>
                            </a>
                        </li>

                        <hr>
                        <li class="sidebar-dropdown">
                            <a href="{{url('profile')}}">
                                <i data-feather="user-plus"></i> <span>My Profile</span>
                            </a>
                        </li>


                        <!-- <li class="sidebar-dropdown">
                            <a href="{{url('latest-news')}}">
                                <span>Latest News</span>
                            </a>
                        </li> -->
                        <hr>
                        <li class="sidebar-dropdown">
                            <a href="mailto:grantgubatan@gmail.com">
                                <i data-feather="mail"></i> <span>Email Support Ticket</span>
                            </a>
                        </li>

                        <!-- <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-chart-line"></i>
                                <span>Charts</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Pie chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Line chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Bar chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Histogram</a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->

                        <!-- <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>Examples</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Documentation</span>
                            </a>
                        </li> -->
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <!-- <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a>
                <a href="#">
                    <i class="fa fa-power-off"></i>
                </a>
            </div> -->
        </nav>

    </div>
