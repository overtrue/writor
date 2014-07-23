<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="writor" />
    <meta name="author" content="writor.me" />
    <title>Writor | 登录</title>
    <link rel="stylesheet" href="{{asset('/backend/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}"  id="style-resource-1">
    <link rel="stylesheet" href="{{asset('/backend/css/font-icons/entypo/css/entypo.css')}}"  id="style-resource-2">
    <link rel="stylesheet" href="{{asset('/backend/css/bootstrap.min.css')}}"  id="style-resource-4">
    <link rel="stylesheet" href="{{asset('/backend/css/core.css')}}"  id="style-resource-5">
    <link rel="stylesheet" href="{{asset('/backend/css/forms.css')}}"  id="style-resource-7">
    <link rel="stylesheet" href="{{asset('/backend/css/custom.css')}}"  id="style-resource-8">
    <script src="{{asset('/backend/js/jquery-1.11.0.min.js')}}"></script>
    <script type="text/javascript">var baseurl = "{{ url('/') }}";</script>
    <!--[if lt IE 9]>
    <script src="{{asset('/backend/js/ie8-responsive-file-warning.js')}}"></script>
    <![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="page-body login-page login-form-fall">
    <div class="login-container">
        <div class="login-header login-caret">
            <div class="login-content">
                <a href="http://github.com/joychao/writor" target="_blank" class="logo">
                    <h1>Writor</h1>
                </a>
                <!-- progress bar indicator -->
                <div class="login-progressbar-indicator">
                    <h3>43%</h3>
                    <span>登录中...</span>
                </div>
            </div>
        </div>
        <div class="login-progressbar">
            <div></div>
        </div>
        <div class="login-form">
            <div class="login-content">
                <div class="form-login-error">
                    <h3>登录失败</h3>
                    <p>用户名或密码错误</p>
                </div>
                <form method="post" role="form" id="form_login">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> <i class="entypo-user"></i></div>
                            <input type="text" class="form-control" name="username" id="username" placeholder="用户名" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"> <i class="entypo-key"></i></div>
                            <input type="password" class="form-control" name="password" id="password" placeholder="密码" autocomplete="off" />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-login">
                            登录
                            <i class="entypo-login"></i>
                        </button>
                    </div>
                </form>
                <div class="login-bottom-links">
                    <a href="{{url('/admin/auth/remind')}}" class="link">忘记密码?</a>
                    <br />
                    <a href="http://github.com/joychao/writor" target="_blank">关于writor</a>
                    -
                    <a href="http://weibo.com/joychaocc" target="_blank">联系作者</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('/backend/js/gsap/main-gsap.js')}}" id="script-resource-1"></script>
    <script src="{{asset('/backend/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')}}" id="script-resource-2"></script>
    <script src="{{asset('/backend/js/bootstrap.js')}}" id="script-resource-3"></script>
    <script src="{{asset('/backend/js/joinable.js')}}" id="script-resource-4"></script>
    <script src="{{asset('/backend/js/resizeable.js')}}" id="script-resource-5"></script>
    <script src="{{asset('/backend/js/api.js')}}" id="script-resource-6"></script>
    <script src="{{asset('/backend/js/cookies.min.js')}}" id="script-resource-7"></script>
    <script src="{{asset('/backend/js/jquery.validate.min.js')}}" id="script-resource-8"></script>
    <script src="{{asset('/backend/js/login.js')}}" id="script-resource-9"></script>
</body>
</html>