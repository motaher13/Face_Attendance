<!DOCTYPE html>
<html>
<head>
    <title>{!! \App\BaseSettings\Settings::$company_name !!}</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style type="text/css">
        body{
            background-color: #eef4f7;
        }
        #main_body{
            background-color: #eef4f7;
            height:100vh;
        }
        #body_content{
            text-align: center;
            margin-top: 5%;
        }
        #download_button{
            width:260px;
            padding-top:12px;
            padding-bottom:12px;
        }
        #download_button_title{
            font-size: 16px;
        }
        #apple_logo{
            font-size: 28px;
        }
    </style>
</head>
<body>
<div class="container-fluid" id="main_body">
    <div class="row" id="body_content">
        <p>Home Page</p>
        <div>
            <a href="{!! route('web.login') !!}">Login</a>

        </div>
        <div>

            <a href="{!! route('web.register') !!}">Register</a>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>