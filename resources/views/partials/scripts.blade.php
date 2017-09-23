<!--[if lt IE 9]>
{!! Html::script('assets/global/plugins/respond.min.js') !!}
{!! Html::script('assets/global/plugins/excanvas.min.js') !!}
{!! Html::script('assets/global/plugins/ie8.fix.min.js') !!}
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
{!! Html::script('assets/global/plugins/jquery.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/global/plugins/toastr/toastr.min.js') !!}
<!-- END CORE PLUGINS -->
@include('partials.toastr')

<!-- BEGIN THEME GLOBAL SCRIPTS -->
{!! Html::script('assets/global/scripts/app.min.js') !!}
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
{!! Html::script('assets/layouts/layout/scripts/layout.min.js') !!}
<!-- END THEME LAYOUT SCRIPTS -->
@yield('scripts')