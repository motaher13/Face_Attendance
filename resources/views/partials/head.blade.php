<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>{!! \App\BaseSettings\Settings::$company_name !!}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Admin Bootstrap" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    {!! Html::style('assets/global/fonts/google-fonts.css') !!}
    {!! Html::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
    {!! Html::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('assets/global/plugins/toastr/toastr.min.css') !!}
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    {!! Html::style('assets/global/css/components.min.css') !!}
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    {!! Html::style('assets/layouts/layout/css/layout.min.css') !!}
    {!! Html::style('assets/layouts/layout/css/themes/darkblue.min.css') !!}
    {!! Html::style('assets/layouts/layout/css/custom.min.css') !!}

    @yield('styles')
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-5517166-10', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<!-- END HEAD -->