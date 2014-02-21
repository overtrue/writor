<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Neon Admin Panel" />
  <meta name="author" content="Laborator.co" />

  <title>Neon</title>

  <link rel="stylesheet" href="{{ asset('/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}"  id="style-resource-1">
  <link rel="stylesheet" href="{{ asset('/assets/css/font-icons/entypo/css/entypo.css') }}"  id="style-resource-2">
  <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}"  id="style-resource-4">
  <link rel="stylesheet" href="{{ asset('/assets/css/neon-core.min.css') }}"  id="style-resource-5">
  <link rel="stylesheet" href="{{ asset('/assets/css/neon-theme.min.css') }}"  id="style-resource-6">
  <link rel="stylesheet" href="{{ asset('/assets/css/neon-forms.min.css') }}"  id="style-resource-7">
  <link rel="stylesheet" href="{{ asset('/assets/css/custom.css') }}"  id="style-resource-8">
  @yield('page_css')
  <script src="{{ asset('/assets/js/jquery-1.11.0.min.js') }}"></script>

  <!--[if lt IE 9]>
  <script src="{{ asset('/assets/js/ie8-responsive-file-warning.js') }}"></script>
  <![endif]-->

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- TS1392191283: Neon - Responsive Admin Template created by Laborator -->
</head>
<body class="page-body page-fade" data-url="http://themes.laborator.co/neon">
  <div class="page-container horizontal-menu">
    <header class="navbar navbar-fixed-top">
      <!-- logo -->
      <div class="navbar-brand">
        <a href="dashboard/main/">
          <h1>Writor</h1>
        </a>
      </div>
      <ul class="navbar-nav">
        <li class="opened active">
          <a href="dashboard/main/"> <i class="entypo-gauge"></i>
            <span>控制面板</span>
          </a>
        </li>
        <li>
          <a href="layouts/layout-api/"> <i class="entypo-doc-text-inv"></i>
            <span>文章</span>
          </a>

          <ul>
            <li>
              <a href="{{ url('/admin/post/all') }}">
                <i class="entypo-list"></i>
                <span>所有文章</span>
              </a>
            </li>

            <li>
              <a href="{{ url('/admin/post/new') }}">
                <i class="entypo-pencil"></i>
                <span>写文章</span>
              </a>
            </li>

            <li>
              <a href="{{ url('/admin/post/category') }}">
                <i class="entypo-folder"></i>
                <span>文章分类</span>
              </a>
            </li>
          </ul>

        </li>

        <li>
          <a href="{{ url('/admin/comment/all') }}">
            <i class="entypo-comment"></i>
            <span>评论</span>
            <span class="badge badge-secondary badge-roundless">9</span>
          </a>
        </li>

        <li>
          <a href="{{ url('/admin/link/all') }}">
            <i class="entypo-link"></i>
            <span>链接</span>
          </a>
          <ul>
            <li>
              <a href="{{ url('/admin/link/all') }}">
                <i class="entypo-list"></i>
                <span>所有链接</span>
              </a>
            </li>

            <li>
              <a href="{{ url('/admin/link/new') }}">
                <i class="entypo-plus"></i>
                <span>添加链接</span>
              </a>
            </li>
          </ul>

        </li>

        <li>
          <a href="">
            <i class="entypo-tools"></i>
            <span>工具</span>
          </a>
          <ul>
            <li>
              <a href="mailbox/main/">
                <i class="entypo-inbox"></i>
                <span>导入</span>
              </a>
            </li>
            <li>
              <a href="mailbox/compose/">
                <i class="entypo-export"></i>
                <span>导出</span>
              </a>
            </li>
          </ul>
        </li>

        <li>
          <a href="{{ url('/admin/user/all') }}">
            <i class="entypo-user"></i>
            <span>用户</span>
          </a>
          <ul>
            <li>
              <a href="{{ url('/admin/user/all') }}">
                <i class="entypo-list"></i>
                <span>所有用户</span>
              </a>
            </li>
            <li>
              <a href="{{ url('/admin/user/new') }}">
                <i class="entypo-plus"></i>
                <span>添加用户</span>
              </a>
            </li>
          </ul>
        </li>

        <li>
          <a href="{{ url('/admin/setting/basic') }}">
            <i class="entypo-cog"></i>
            <span>设置</span>
          </a>
          <ul>
            <li>
              <a href="{{ url('/admin/setting/basic') }}">
                <span>基本设置</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-right pull-right">

        <!-- dropdowns -->
        <!-- raw links -->
        <li class="dropdown"></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            Skin
            <span class="label label-danger margin-left">New</span>
          </a>

          <ul class="dropdown-menu theme-skins pull-right">
            <li class="caret"></li>

            <li class="active">
              <a href="layouts/horizontal-menu-fluid/?skin=default" data-skin="default">
                <i class="skin-main"></i>
                Default
              </a>
            </li>

            <li>
              <a href="layouts/horizontal-menu-fluid/?skin=blue" data-skin="blue">
                <i class="skin-blue"></i>
                Blue
              </a>
            </li>

            <li>
              <a href="layouts/horizontal-menu-fluid/?skin=red" data-skin="red">
                <i class="skin-red"></i>
                Red
              </a>
            </li>

            <li>
              <a href="layouts/horizontal-menu-fluid/?skin=green" data-skin="green">
                <i class="skin-green"></i>
                Green
              </a>
            </li>

            <li>
              <a href="layouts/horizontal-menu-fluid/?skin=cafe" data-skin="cafe">
                <i class="skin-cafe"></i>
                Cafe
              </a>
            </li>

            <li>
              <a href="layouts/horizontal-menu-fluid/?skin=purple" data-skin="purple">
                <i class="skin-purple"></i>
                Purple
              </a>
            </li>

            <li>
              <a href="layouts/horizontal-menu-fluid/?skin=yellow" data-skin="yellow">
                <i class="skin-yellow"></i>
                Yellow
              </a>
            </li>

            <li>
              <a href="layouts/horizontal-menu-fluid/?skin=black" data-skin="black">
                <i class="skin-black"></i>
                Black
              </a>
            </li>

            <li>
              <a href="layouts/horizontal-menu-fluid/?skin=white" data-skin="white">
                <i class="skin-white"></i>
                White
              </a>
            </li>
          </ul>
        </li>

        <li class="sep"></li>

        <li>
          <a href="extra/login/">
            注销登录
            <i class="entypo-logout right"></i>
          </a>
        </li>

        <!-- mobile only -->
        <li class="visible-xs">

          <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
          <div class="horizontal-mobile-menu visible-xs">
            <a href="#" class="with-animation">
              <!-- add class "with-animation" to support animation -->
              <i class="entypo-menu"></i>
            </a>
          </div>

        </li>

      </ul>
      <!-- /sidebar --> </header>
    <div class="main-content container">
      @yield('content')
      <!-- Footer -->
      <footer class="main">
        &copy; {{date('Y')}}
        <strong>Neon</strong>
        Admin Theme by
        <a href="http://laborator.co" target="_blank">Laborator</a>
      </footer>
    </div>
  </div>
  
  <script src="{{ asset('/assets/js/gsap/main-gsap.js') }}" id="script-resource-1"></script>
  <script src="{{ asset('/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}" id="script-resource-2"></script>
  <script src="{{ asset('/assets/js/bootstrap.js') }}" id="script-resource-3"></script>
  <script src="{{ asset('/assets/js/joinable.js') }}" id="script-resource-4"></script>
  <script src="{{ asset('/assets/js/resizeable.js') }}" id="script-resource-5"></script>
  <script src="{{ asset('/assets/js/neon-api.js') }}" id="script-resource-6"></script>
  <script src="{{ asset('/assets/js/cookies.min.js') }}" id="script-resource-7"></script>
  <script src="{{ asset('/assets/js/selectboxit/jquery.selectBoxIt.min.js') }}" id="script-resource-11"></script>
  <script src="{{ asset('/assets/js/admin-common.js') }}" id="script-resource-23"></script>
  @yield('page_js')
</body>
</html>