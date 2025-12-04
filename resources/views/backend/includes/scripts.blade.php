@stack('top_scripts')

    <!-- All Jquery -->
    <!-- -------------------------------------------------------------- -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <script src="{{ asset('dist/js/app.init.js') }}"></script>
    <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('dist/js/feather.min.js') }}"></script>
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <!-- Vector map JavaScript -->
    <script src="{{ asset('assets/libs/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/extra-libs/jvector/jquery-jvectormap-us-aea-en.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('dist/js/pages/dashboards/dashboard3.js') }}"></script>

@stack('scripts_libs')

<!-- for theme setting in your project! -->
<!-- <script src="assets/js/setting-demo.js"></script>
<script src="assets/js/demo.js"></script> -->

@stack('scripts')