@auth
<!DOCTYPE html>
<html lang="en">
<?php
$user = Auth::user();
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AwaFlights Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('admin_vendor/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_vendor/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('admin_vendor/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('admin_vendor/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="/"><img src="{{ asset('img/logo.jpg') }}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="/"><img src="{{ asset('img/logo.jpg') }}" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="search">
                  <i class="mdi mdi-magnify"></i>
                </span>
              </div>
              <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
         <li class="nav-item dropdown mr-4">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-information mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="mdi mdi-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-account-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name">{{ $user->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="/logout">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{action('AdminController@index')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#flights" aria-expanded="false" aria-controls="flights">
              <i class="mdi mdi-airplane-landing menu-icon"></i>
              <span class="menu-title">Flights</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="flights">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{url('/dashboard/issueTicket')}}">Issue Ticket</a></li>
								<li class="nav-item"> <a class="nav-link" href="{{url('/dashboard/checkReservation')}}">Reservation Status</a></li>
								<li class="nav-item"> <a class="nav-link" href="{{action('AdminController@getFlightDetails')}}">Flight Detail</a></li>
              </ul>
            </div>
					</li>
					<li class="nav-item">
							<a class="nav-link" data-toggle="collapse" href="#hotels" aria-expanded="false" aria-controls="hotels">
								<i class="mdi mdi-home-modern menu-icon"></i>
								<span class="menu-title">Hotels</span>
								<i class="menu-arrow"></i>
							</a>
							<div class="collapse" id="hotels">
								<ul class="nav flex-column sub-menu">
									<li class="nav-item"> <a class="nav-link" href="#">Hotels Booked</a></li>
								</ul>
							</div>
						</li>
        </ul>
			</nav>
			
      <!-- partial -->
      @yield('main')
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('admin_vendor/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('admin_vendor/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('admin_vendor/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('admin_vendor/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('admin_vendor/js/off-canvas.js') }}"></script>
  <script src="{{ asset('admin_vendor/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('admin_vendor/js/template.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('admin_vendor/js/dashboard.js') }}"></script>
  <script src="{{ asset('admin_vendor/js/data-table.js') }}"></script>
  <script src="{{ asset('admin_vendor/js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('admin_vendor/js/dataTables.bootstrap4.js') }}"></script>
	<script>
			$(document).ready(function(e){
				$('#bookingSelect').on('change',function(e){
					id  = $(this).val();
					console.log(id);
				window.location = ""+id;
				});
				$('#bookingSelectNon').on('change',function(e){
					id  = $(this).val();
					console.log(id);
				window.location = "flight/"+id;
				});
			});
		</script>
  <!-- End custom js for this page-->
</body>

</html>
@else
	
<script> window.location = "{{ url('/') }}"; </script>



@endauth

