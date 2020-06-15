@extends('Admin.master')
@section('content')
@include('Admin.partials.dashboard_home_content')
@endsection
@push('js')
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Vector map JavaScript -->
    <script src="{{ asset('Backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!--sparkline JavaScript -->
    <script src="{{ asset('Backend/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--morris JavaScript -->
    <script src="{{ asset('Backend/assets/plugins/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('Backend/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('Backend/assets/js/dashboard4.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset('Backend/assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
@endpush
