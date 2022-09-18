@include('partials.header')
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search1" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
              <i class="fe fe-sun fe-16"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
              <span class="fe fe-grid fe-16"></span>
            </a>
          </li>
          <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
              <span class="fe fe-bell fe-16"></span>
              <span class="dot dot-md bg-success"></span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activities</a>
              <form class="inline" action="/logout" method="POST">
                @csrf
              <button class="dropdown-item" type="submit">Logout</button>
              </form>
            </div>
          </li>
        </ul>
      </nav>


  {{-- ----------------------------SIDE BAR---------------------------------------- --}}
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            @foreach($setting as $settings)
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
              <img src="{{$settings->barangay_logo ? asset ('storage/' .$settings->barangay_logo) : asset('/storage/no/logo.png')}}" style="width: 50%">
              <p>{{$settings->barangay_name}}</p>
            </a>
            @endforeach
          </div>

          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="/dashboard"  aria-expanded="false" class="nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text" >Dashboard</span><span class="sr-only">(current)</span>
              </a>
             
            </li>
          </ul>

          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Menu</span>
          </p>
         
          <ul class="navbar-nav flex-fill w-100 mb-2">
           
            <li class="nav-item dropdown">
              <a href="#reports" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fa fa-file fe-16"></i>
                <span class="ml-3 item-text">Compilation of Reports</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="reports">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/reports"><span class="ml-1 item-text">Accomplishment Report</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/financialreport"><span class="ml-1 item-text">Financial Report</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/blotterrecord"><span class="ml-1 item-text">Blotter Report</span></a>
                </li>
              </ul>
            </li>
  
            <li class="nav-item dropdown">
              <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fas fa-user-cog"></i>
                <span class="ml-3 item-text">Barangay Officials</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/official"><span class="ml-1 item-text">Add Baragay Officials</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/listBrgyOfficial"><span class="ml-1 item-text">Barangay Official List</span></a>
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fa fa-users"></i>
                <span class="ml-3 item-text">Residents</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="forms">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/residents"><span class="ml-1 item-text">Add Resident</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/registration"><span class="ml-1 item-text">Resident Registration</span></a>
                </li>
          
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fa fa-certificate"></i>
                <span class="ml-3 item-text">Requests</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/certificateOfClearance"><span class="ml-1 item-text">Barangay Clearance</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/certificateOfResidency"><span class="ml-1 item-text">Certificate of Residency</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/certificateOfIndigency"><span class="ml-1 item-text">Certificate of Indigency</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/blotter"><span class="ml-1 item-text">Blotter Report</span></a>
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link" href="/messages">
                <i class="fa fa-envelope fe-16"></i>
                <span class="ml-3 item-text">Messages</span>
              </a>
            </li>

            {{-- <li class="nav-item w-100">
              <a class="nav-link" href="/calendar">
                <i class="fe fe-calendar fe-16"></i>
                <span class="ml-3 item-text">Calendar</span>
              </a>
            </li> --}}

            {{-- <li class="nav-item w-100">
              <a class="nav-link" href="/revenues">
                <i class="fa fa-money"></i>
                <span class="ml-3 item-text">Revenues</span>
              </a>
            </li> --}}
            <li class="nav-item dropdown">
              <a href="#charts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-pie-chart fe-16"></i>
                <span class="ml-3 item-text">Profiling</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="charts">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/seniorProfiling"><span class="ml-1 item-text">Senior Citizen</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="/votersProfiling"><span class="ml-1 item-text">Voters</span></a>
                </li>
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Apps</span>
          </p>
          
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/calendar">
                <i class="fe fe-calendar fe-16"></i>
                <span class="ml-3 item-text">Calendar</span>
              </a>
            </li>
            <li class="nav-item w-100">
              <a class="nav-link" href="/announcements">
                <i class="fa fa-bullhorn fe-16"></i>
                <span class="ml-3 item-text">Announcements</span>
              </a>
            </li>
            
         
          </ul>
        
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>System</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/activitylog">
                <i class="fe fe-help-circle fe-16"></i>
                <span class="ml-3 item-text">Activity Logs</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="/settings">
                <i class="fas fa-tools"></i>
                <span class="ml-3 item-text">Settings</span>
              </a>
            </li>
          </ul>
        </nav>
      </aside>

      {{-- --------------------------------CONTENT------------------------------------------ --}}
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center mb-2">
                <div class="col">
                 
                  @if(session()->has('message'))
                  <div class="alert" id="alert">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  {{session()->get('message')}}
      
                </div>

                @endif
                  @yield('content')

                </div>
              </div>
    {{-- --------------------------------END OF CONTENT--------------------------------------- --}}
            
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main> <!-- main -->
    </div> <!-- .wrapper -->
@include('partials.footer')