<!--[if lt IE 9]>
<script type="text/javascript" src="{!! asset('assets/global/plugins/respond.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/excanvas.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/ie8.fix.min.js') !!}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script type="text/javascript" src="{!! asset('assets/global/plugins/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/global/plugins/toastr/toastr.min.js') !!}"></script>
<!-- END CORE PLUGINS -->
@include('partials.toastr')

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script type="text/javascript" src="{!! asset('assets/global/scripts/app.min.js') !!}"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script type="text/javascript" src="{!! asset('assets/layouts/layout/scripts/layout.min.js') !!}"></script>
<!-- END THEME LAYOUT SCRIPTS -->
@yield('scripts')