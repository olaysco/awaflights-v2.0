<html lang="en"><head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>AwaFlights Dashboard</title>
		<!-- plugins:css -->
		<link rel="stylesheet" href="{{ asset('admin_vendor/vendors/mdi/css/materialdesignicons.min.css')}}">
  		<link rel="stylesheet" href="{{ asset('admin_vendor/vendors/base/vendor.bundle.base.css') }}">
		<!-- endinject -->
		<!-- plugin css for this page -->
		<!-- End plugin css for this page -->
		<!-- inject:css -->
		<link rel="stylesheet" href="{{ asset('admin_vendor/css/style.css') }}">
		<!-- endinject -->
		<link rel="shortcut icon" href="">
	  </head>
	  
	  <body>
		<div class="container-scroller">
		  <div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth px-0">
			  <div class="row w-100 mx-0">
				<div class="col-lg-4 mx-auto">
				  <div class="auth-form-light text-left py-5 px-4 px-sm-5">
					<div class="brand-logo text-center">
					  <img src="{{ asset('img/logo.jpg') }}" alt="logo">
					</div>
					@include('layout.errors')
					<h6 class="font-weight-light">Sign in to continue.</h6>
					<form class="pt-3" action="/login" method="POST">
						@csrf
					  <div class="form-group">
						<input type="email" name="email" class="form-control form-control-lg" required id="email1" placeholder="Email">
					  </div>
					  <div class="form-group">
						<input type="password" name="password" required class="form-control form-control-lg" id="password1" placeholder="Password">
					  </div>
					  <div class="mt-3">
						<button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
					  </div>
					  <div class="my-2 d-flex justify-content-between align-items-center">
						<div class="form-check">
						  <label class="form-check-label text-muted">
							<input type="checkbox" class="form-check-input">
							Keep me signed in
						  <i class="input-helper"></i></label>
						</div>
						<a href="#" class="auth-link text-black">Forgot password?</a>
					  </div>
					  <div class="mb-2">
						
					  </div>
					</form>
				  </div>
				</div>
			  </div>
			</div>
			<!-- content-wrapper ends -->
		  </div>
		  <!-- page-body-wrapper ends -->
		</div>
		<!-- container-scroller -->
		<!-- plugins:js -->
		<script src="{{ asset('admin_vendor/vendors/base/vendor.bundle.base.js') }}"></script>
		<!-- endinject -->
		<!-- inject:js -->
		<script src="{{ asset('admin_vendor/js/off-canvas.js') }}"></script>
  		<script src="{{ asset('admin_vendor/js/hoverable-collapse.js') }}"></script>
 		 <script src="{{ asset('admin_vendor/js/template.js') }}"></script>
		<!-- endinject -->
	  
	  
	  
	  </body></html>
