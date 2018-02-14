<!DOCTYPE html>

<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>
    <title>Register</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="{!! asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! asset('assets/global/plugins/toastr/toastr.min.css') !!}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{!! asset('assets/global/css/components.min.css') !!}" rel="stylesheet" id="style_components" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{!! asset('assets/pages/css/login.min.css') !!}" rel="stylesheet" type="text/css"/>

    <style>
        #particle {
            background-color: #000000;
            position:fixed;
            top:0;
            right:0;
            bottom:0;
            left:0;
            z-index:0;
        }
        .overlay {
            position: relative;
        }

    </style>
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<body class=" login">
<div id="particle"></div>
<!-- BEGIN LOGO -->
<div class="logo overlay">
    {{--<a href="index.html">
        <img src="../assets/pages/img/logo-big.png" alt=""/> </a>--}}
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content overlay">
    <!-- END LOGIN FORM -->
    <form action="{!! route('business.role') !!}" method="POST">
        {!! csrf_field() !!}
        <p class="hint"> Enter Business Details below: </p>

        <div class="form-group">
            <label for="title" class="control-label visible-ie8 visible-ie9">Title</label>
            <input type="text" name="title" class="form-control form-control-solid placeholder-no-fix" value="{!! old('title') !!}" placeholder="Title"  required/>
        </div>


        <div class="form-group">
            <label for="address" class="control-label visible-ie8 visible-ie9">Address</label>
            <input type="text" name="address" class="form-control form-control-solid placeholder-no-fix" value="{!! old('address') !!}" placeholder="Address"  required/>
        </div>

        <div class="form-group">
            <label for="phone" class="control-label visible-ie8 visible-ie9">Phone</label>
            <input type="text" name="phone" class="form-control form-control-solid placeholder-no-fix" value="{!! old('phone') !!}" placeholder="Phone"  required/>
        </div>


        <div class="form-actions">
            <a href="{!! route('login') !!}" class="btn green btn-outline">Back</a>
            {{--<button type="button" id="register-back-btn" class="btn green btn-outline">Back</button>--}}
            <input type="submit" name="submit" class="btn btn-success uppercase pull-right" value="Register"/>
            {{--<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>--}}

        </div>
    </form>

</div>
<div class="copyright"> {!! date('Y') !!} © {!! \App\BaseSettings\Settings::$company_name !!} </div>

<script src="{!! asset('assets/global/plugins/jquery.min.js') !!}" type="text/javascript"></script>
<<<<<<< HEAD
=======
<script src="{!! asset('assets/global/plugins/toastr/toastr.min.js') !!}" type="text/javascript"></script>
>>>>>>> release/style-fix
<script src="{!! asset('assets/particles/particles.min.js') !!}"></script>
<script>
    particlesJS.load('particle', '../assets/particles.json', function() {
        console.log('callback - particles.js config loaded');
    });
</script>
<!-- END CORE PLUGINS -->
@include('partials.toastr')
</body>

</html>