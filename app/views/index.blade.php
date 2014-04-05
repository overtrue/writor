<!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Writor - a blog framework">
    <meta name="author" content="Joy">

    <title>Writor - a blog framework.</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('/frontend/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="{{asset('/frontend/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <!-- Add custom CSS here -->
    <link href="{{asset('/frontend/css/landing-page.css')}}" rel="stylesheet"></head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Writor</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="http://github.com/joychao/writor">Github</a>
                    </li>
                    <li>
                        <a href="#services">Documentation</a>
                    </li>
                    <li>
                        <a href="#services">Blog</a>
                    </li>
                    <li>
                        <a href="http://github.com/joychao/writor/issues" target="_blank">Contact</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse --> 
        </div><!-- /.container --> 
    </nav>

    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Writor</h1>
                        <h3>a blog framework based on Laravel 4</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                            	 <iframe src="http://ghbtns.com/github-btn.html?user=joychao&repo=writor&type=watch"
                            	  allowtransparency="true" frameborder="0" scrolling="0" width="62" height="20"></iframe>
                            </li>
                            <li>
                            	<iframe src="http://ghbtns.com/github-btn.html?user=joychao&repo=writor&type=fork"
                            	  allowtransparency="true" frameborder="0" scrolling="0" width="62" height="20"></iframe>
                            </li>
                            <li>
                            	<iframe src="http://ghbtns.com/github-btn.html?user=joychao&repo=writor&type=follow"
                            	  allowtransparency="true" frameborder="0" scrolling="0" width="122" height="20"></iframe>	
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /.container --> 
    </div><!-- /.intro-header -->
    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">
                        强大的PHP框架 - Laravel 4
                    </h2>
                    <p class="lead">
                        Laravel 是一个简单优雅的 PHP WEB 开发框架，将你从意大利面条式的代码中解放出来。通过简单、高雅、表达式语法开发出很棒的 WEB应用!
                        <a href="http://laravel.com" target="_blank">http://laravel.com</a>
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="{{asset('/frontend/img/laravel.jpg')}}" alt=""></div>
            </div>

        </div>
        <!-- /.container --> 
    </div>
    <!-- /.content-section-a -->
    <div class="content-section-b">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">
                        「易读易写」<br> 内置Markdown编辑器
                    <p class="lead">
                        内置markdown编辑器，支持实时预览。对于 Web 开发者和设计者来说，清晰的格式让一些非技术人员倍感亲切，因为无需超文本，Markdown 更直观更容易被记住。
                    </p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="{{asset('/frontend/img/markdown.png')}}" alt="">
                </div>
            </div>

        </div><!-- /.container --> 
    </div><!-- /.content-section-b -->
    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">
                        可选多用户写作
                        <br>同样适用于团队博客</h2>
                    <p class="lead">
                        可选支持多用户写作，方便团队建立自己的知识库或者分享平台。
                    </p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="{{asset('/frontend/img/multi-user.png')}}" alt=""></div>
            </div>
        </div><!-- /.container --> 
    </div><!-- /.content-section-a -->

    <div class="banner">
        <div class="container">
            <div class="row">
            	<div class="col-lg-6"></div>
                <div class="col-lg-4">
                    <h2>Get Started</h2>
                </div>
                <div class="col-lg-2">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://github.com/joychao/writor" class="btn btn-success btn-lg">
                                <i class="fa fa-github fa-fw"></i>
                                <span class="network-name">Github</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- /.container --> 
    </div><!-- /.banner -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                    	<li>
	                        <a href="#about">Home</a>
	                    </li>
                        <li>
	                        <a href="#about">About</a>
	                    </li>
	                    <li>
	                        <a href="http://github.com/joychao/writor">Github</a>
	                    </li>
	                    <li>
	                        <a href="#services">Documentation</a>
	                    </li>
	                    <li>
	                        <a href="#services">Blog</a>
	                    </li>
	                    <li>
	                        <a href="http://github.com/joychao/writor/issues" target="_blank">Contact</a>
	                    </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Joychao {{date('Y')}}. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{asset('/frontend/js/jquery-1.10.2.js')}}"></script>
    <script src="{{asset('/frontend/js/bootstrap.js')}}"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-49740823-1', 'writor.me');
      ga('send', 'pageview');

    </script>
</body>
</html>