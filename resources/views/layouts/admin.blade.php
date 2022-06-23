<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('assets/images/favicon-32x32.png')}}" type="image/png" />
	
	<!--plugins-->
	@yield("style")
	<link href="{{asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/header-colors.css')}}" />
    <link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/datetimepicker/css/classic.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/datetimepicker/css/classic.time.css')}}" rel="stylesheet" />
	<link href="{{asset('assets/plugins/datetimepicker/css/classic.date.css')}}" rel="stylesheet" />
	<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>AeroIndia Admin Panel</title>
	@notifyCss
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                   
                    <div class="search-bar flex-grow-1">
                        <div class="position-relative search-bar-box">
                            <input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
                            <span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
                        </div>
                    </div>
                    <div class="top-menu ms-auto">
                     
                    </div>
                    <div class="user-box dropdown border-light-2">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('assets/images/avatars/avatar-2.png')}}" class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">{{ Auth::user()->name }}</p>
                                <!-- <p class="designattion mb-0">Web Designer</p> -->
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </ul>
                    </div>
                </nav>
            </div>
           
        </header>
		<!--end header -->
		<!--navigation-->
		<div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{asset('assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">ADMIN</h4>
                </div>
                <!-- <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
                </div> -->
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                
                <li>
                    <a href="{{url('/')}}" class="">
                        <div class="parent-icon"><i class='bx bx-home'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-spa' ></i>
						</div>
						<div class="menu-title">Setting</div>
					</a>
					<ul class="mm-collapse">
						<li> <a href="{{url('/addcountry')}}"><i class="bx bx-right-arrow-alt"></i>Country</a>
						</li>
						@can('Approve Billing')
                        <li> <a href="{{url('/addstate')}}"><i class="bx bx-right-arrow-alt"></i>State</a>
						</li>
						@endcan
                        <li> <a href="{{url('/addcity')}}"><i class="bx bx-right-arrow-alt"></i>City</a>
						</li>
						@can('View Billing')
                        <li> <a href="{{url('/currency')}}"><i class="bx bx-right-arrow-alt"></i>Currency</a>
						</li>
						@endcan
                        <li> <a href="{{url('/currency-exchange')}}"><i class="bx bx-right-arrow-alt"></i>Currency Rate</a>
						</li>
                        <li> <a href="{{url('/fee-structure')}}"><i class="bx bx-right-arrow-alt"></i>Fee Structure</a>
						</li>
                        <li> <a href="{{url('/addprofesstionalDesignation')}}"><i class="bx bx-right-arrow-alt"></i>Professtional Designation</a>
						</li>
                        <li> <a href="{{url('/addqualificationmaster')}}"><i class="bx bx-right-arrow-alt"></i>Qualification Master</a>
						</li>
                        <li> <a href="{{url('/addmembertypemaster')}}"><i class="bx bx-right-arrow-alt"></i>Member Type Master</a>
						</li>
					</ul>
				</li>


               

                

                



            </ul>
            
            <!--end navigation-->
        </div>
		<!--end navigation-->
		<!--start page wrapper -->
		{{$slot}}
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
                                  @php
                                    $date = date('Y', time());
                                     @endphp
			<p class="mb-0">Copyright ©  {{$date}}. All right reserved.</p>
		</footer>
	</div>
	
	<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<!--plugins-->
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<!--app JS-->
	@notifyJs
    <x:notify-messages />
	<script src="{{asset('assets/js/app.js')}}"></script>

    <script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
	<script>
          $(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	  <script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function () {
			  'use strict'

			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.querySelectorAll('.needs-validation')

			  // Loop over them and prevent submission
			  Array.prototype.slice.call(forms)
				.forEach(function (form) {
				  form.addEventListener('submit', function (event) {
					if (!form.checkValidity()) {
					  event.preventDefault()
					  event.stopPropagation()
					}

					form.classList.add('was-validated')
				  }, false)
				})
			})()
	</script>
	<script>
		$( document ).ready(function() {
			jQuery('#menu').metisMenu().show();	
});
		
	</script>
	<script>
		$(function () {
		for (var i = window.location, o = $(".metismenu li a").filter(function () {
			return this.href == i;
		}).addClass("").parent().addClass("mm-active");;) {
			if (!o.is("li")) break;
			o = o.parent("").addClass("mm-show").parent("").addClass("mm-active");
		}
	});
	// metismenu
	$(function () {
		$('#menu').metisMenu();
	});
	</script>
	@yield("script")
    @include("layouts.theme-control")
</body>

</html>
