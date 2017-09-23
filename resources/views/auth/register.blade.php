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
    <title>Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/global/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="../assets/pages/css/login.min.css" rel="stylesheet" type="text/css"/>

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
    <a href="index.html">
        <img src="../assets/pages/img/logo-big.png" alt=""/> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content overlay">
    <!-- END LOGIN FORM -->
    {!! Form::open(['route' => 'web.do.register','method' => 'post']) !!}
    <h3 class="font-green">Sign Up</h3>
    <p class="hint"> Enter your account details below: </p>

    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        {!! Form::label('name','E-Mail',['class' => 'control-label visible-ie8 visible-ie9']) !!}
        {!! Form::text('name',null,['class' => 'form-control form-control-solid placeholder-no-fix','autocomplete' => 'off','placeholder' => 'Username','required']) !!}
    </div>

    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        {!! Form::label('email','E-Mail',['class' => 'control-label visible-ie8 visible-ie9']) !!}
        {!! Form::email('email',null,['class' => 'form-control form-control-solid placeholder-no-fix','autocomplete' => 'off','placeholder' => 'Email-Address','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password','Password',['class' => 'control-label visible-ie8 visible-ie9']) !!}
        {!! Form::password('password',['class' => 'form-control form-control-solid placeholder-no-fix','autocomplete' => 'off', 'placeholder' => 'Password','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation','Re-type Your Password',['class' => 'control-label visible-ie8 visible-ie9']) !!}
        {!! Form::password('password_confirmation',['class' => 'form-control form-control-solid placeholder-no-fix','autocomplete' => 'off', 'placeholder' => 'Re-type Your Password','required']) !!}
    </div>
    {{--<div class="form-group margin-top-20 margin-bottom-20">
        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="tnc"/> I agree to the
            <a href="javascript:;">Terms of Service </a> &
            <a href="javascript:;">Privacy Policy </a>
            <span></span>
        </label>
        <div id="register_tnc_error"></div>
    </div>--}}
    <div class="form-actions">
        <a href="{!! route('web.login') !!}" class="btn green btn-outline">Back</a>
        {{--<button type="button" id="register-back-btn" class="btn green btn-outline">Back</button>--}}
        {!! Form::submit('Register', ['class' => 'btn btn-success uppercase pull-right']) !!}
        {{--<button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>--}}
    </div>
    {!! Form::close() !!}

</div>
<div class="copyright"> {!! date('Y') !!} © {!! \App\BaseSettings\Settings::$company_name !!} </div>
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<script src="../assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/toastr/toastr.min.js" type="text/javascript"></script>
<script src="../assets/particles/particles.min.js"></script>
<script>
    particlesJS.load('particle', '../assets/particles.json', function() {
        //console.log('callback - particles.js config loaded');
    });
</script>
<!-- END CORE PLUGINS -->
@include('partials.toastr')
</body>

</html>