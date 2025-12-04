<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta
		name="keywords"
		content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, admin pro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template"
	/>
	<meta
		name="description"
		content="Admin Pro is powerful and clean admin dashboard template"
	/>
	<meta name="robots" content="noindex,nofollow" />
	<title>{{ config('app.name') }} - @yield('title')</title>
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('assets/img/tap2deal/icon.png') }}" type="image/x-icon"/>
	<!-- this page js -->
	<link
		rel="stylesheet"
		href="../../assets/libs/apexcharts/dist/apexcharts.css"
	/>
	<link
		href="../../assets/extra-libs/css-chart/css-chart.css"
		rel="stylesheet"
	/>
	<!-- Vector CSS -->
	<link
		href="../../assets/libs/jvectormap/jquery-jvectormap.css"
		rel="stylesheet"
	/>
	<!-- Custom CSS -->
	<link href="../../dist/css/style.min.css" rel="stylesheet" />

    <!-- Script Files -->
    @include('backend.includes.head_scripts')
	<!-- CSS Files -->
    @include('backend.includes.styles')
</head>
<body>
	<div class="wrapper">
		<!-- Sidebar -->
         @include('backend.includes.sidebar')
		<!-- End Sidebar -->

		<div class="main-panel">
            <!--  Header Start -->
			@include('backend.includes.header')
            <!--  Header End -->

			<div class="container">
                @yield('content')
			</div>
			
            <!--  Footer Start -->
            @include('backend.includes.footer')
            <!--  Footer End -->
		</div>	 
	</div>

	<!--   scripts Files   -->
    @include('backend.includes.scripts')
</body>
</html>