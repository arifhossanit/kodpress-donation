@stack('styles_libs')

<link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/dist/apexcharts.css') }}" />
    <link
      href="{{ asset('assets/extra-libs/css-chart/css-chart.css') }}"
      rel="stylesheet"
    />
    <!-- Vector CSS -->
    <link
      href="{{ asset('assets/libs/jvectormap/jquery-jvectormap.css') }}"
      rel="stylesheet"
    />
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />

<!-- for theme setting -->
<!-- <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}"> -->

@stack('styles')