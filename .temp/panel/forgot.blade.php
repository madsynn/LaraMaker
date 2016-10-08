<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Neon Admin Panel"/>
    <meta name="author" content=""/>
    <title>iCMS - {{lang('Forgot Password')}}</title>
    <link rel="stylesheet" href="{{url('panel/assets')}}/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="{{url('panel/assets')}}/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="{{url('panel/assets')}}/css/bootstrap.css">
    <link rel="stylesheet" href="{{url('panel/assets')}}/css/neon-core.css">
    <link rel="stylesheet" href="{{url('panel/assets')}}/css/neon-theme.css">
    <link rel="stylesheet" href="{{url('panel/assets')}}/css/custom.css">
    <script src="{{url('panel/assets')}}/js/jquery-1.11.0.min.js"></script>
    <script src="{{url('panel/assets')}}/js/ie8-responsive-file-warning.js"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">
<script type="text/javascript">
    var baseurl = '';
</script>
<div class="login-container">
    <div class="login-header login-caret">
        <div class="login-content">
            <a href="index.html" class="logo">
                <h1 align="center" style="color:#FFF;font-weight:bold;">{{lang('Forgot Password')}}</h1>
            </a>
        </div>
    </div>
    <div class="login-progressbar">
        <div></div>
    </div>
    <div class="login-form">
        <div class="login-content">
            @if(Session::has('login_error'))
                <div class="form-login-error" style="display: block;">
                    <h3>{{lang('Oops')}}</h3>

                    <p>{{Session::get('login_error')}}</p>
                </div>
            @endif
            @if(Session::has('success'))
                <div class="form-register-success" style="display: block;">
                    <h3>{{lang('Done')}}</h3>

                    <p>{{Session::get('success')}}</p>
                </div>
            @endif
            {!!Form::open(['url'=>'admin/forgot'])!!}
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="entypo-user"></i>
                    </div>
                    <input type="text" class="form-control" name="username" id="username"
                           placeholder="{{lang('Username')}}"
                           autocomplete="off"/>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-login">
                    <i class="entypo-login"></i>
                    {{lang('Send')}}
                </button>
            </div>
            {!!Form::close()!!}
            <div class="login-bottom-links">
                <a href="{{url('admin/login')}}" class="link">{{lang('Back To Login')}}</a>
            </div>
        </div>
    </div>
</div>
<script src="{{url('panel/assets')}}/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="{{url('panel/assets')}}/js/bootstrap.js"></script>
<script src="{{url('panel/assets')}}/js/joinable.js"></script>
<script src="{{url('panel/assets')}}/js/neon-api.js"></script>
<script src="{{url('panel/assets')}}/js/jquery.validate.min.js"></script>
<script src="{{url('panel/assets')}}/js/neon-login.js"></script>
</body>
</html>