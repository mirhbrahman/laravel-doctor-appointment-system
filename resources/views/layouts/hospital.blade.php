<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Hospital Area</title>

	<script src="//code.jquery.com/jquery-1.12.3.js"></script>



	<!-- Bootstrap Core CSS -->
	<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="{{asset('vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="{{asset('dist/css/sb-admin-2.css')}}" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

	@yield('assets')

</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">
					@if (Auth::user())
						{{Auth::user()->name}}
					@endif

				</a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
						<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							<i class="fa fa-sign-out fa-fw"></i> Logout
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							{{ csrf_field() }}
						</form>
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->

		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					<li>
						<a href="{{route('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
					</li>
					<li>
						<a href="{{route("hosBasicInfo.index")}}"><i class="fa fa-table fa-fw"></i> Basic Info</a>
					</li>
					<li>
						<a href="{{route("branch.index")}}"><i class="fa fa-table fa-fw"></i> Brach</a>
					</li>
					<li>
						<a href="{{route("dept.index")}}"><i class="fa fa-table fa-fw"></i> Department</a>
					</li>
					<li>
						<a href="{{route("hosDoc.search")}}"><i class="fa fa-plus fa-fw"></i> Add Doctor</a>
					</li>

					<li>
						<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="flot.html">Flot Charts</a>
							</li>
							<li>
								<a href="morris.html">Morris.js Charts</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
					</li>
					<li>
						<a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="panels-wells.html">Panels and Wells</a>
							</li>
							<li>
								<a href="buttons.html">Buttons</a>
							</li>
							<li>
								<a href="notifications.html">Notifications</a>
							</li>
							<li>
								<a href="typography.html">Typography</a>
							</li>
							<li>
								<a href="icons.html"> Icons</a>
							</li>
							<li>
								<a href="grid.html">Grid</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="#">Second Level Item</a>
							</li>
							<li>
								<a href="#">Second Level Item</a>
							</li>
							<li>
								<a href="#">Third Level <span class="fa arrow"></span></a>
								<ul class="nav nav-third-level">
									<li>
										<a href="#">Third Level Item</a>
									</li>
									<li>
										<a href="#">Third Level Item</a>
									</li>
									<li>
										<a href="#">Third Level Item</a>
									</li>
									<li>
										<a href="#">Third Level Item</a>
									</li>
								</ul>
								<!-- /.nav-third-level -->
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
					<li>
						<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="blank.html">Blank Page</a>
							</li>
							<li>
								<a href="login.html">Login Page</a>
							</li>
						</ul>
						<!-- /.nav-second-level -->
					</li>
				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>
		<!-- /.navbar-static-side -->
	</nav>

	<div id="page-wrapper">

		<hr>
		<div class="row">
			@yield('content')
		</div>
	</div>



</div>
<!-- /#wrapper -->

<!-- jQuery -->

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Metis Menu Plugin JavaScript -->

<script src="{{asset('vendor/metisMenu/metisMenu.min.js')}}"></script>
<!-- Morris Charts JavaScript -->
<script src="{{asset('vendor/raphael/raphael.min.js')}}"></script>


<script src="{{asset('dist/js/sb-admin-2.js')}}"></script>
</body>

</html>
