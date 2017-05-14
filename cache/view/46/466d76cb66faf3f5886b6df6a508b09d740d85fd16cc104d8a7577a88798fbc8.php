<?php

/* layout.html */
class __TwigTemplate_bc330110e77af25d8a936787ee8fdd85f67852f9a847300acdb13395193f1207 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<!DOCTYPE html>
<html lang=\"zh-CN\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"/favicon.ico\">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href=\"https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css\" rel=\"stylesheet\">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href=\"/public/css/ie10-viewport-bug-workaround.css\" rel=\"stylesheet\">

    <!-- Custom styles for this template -->
    <link href=\"/public/css/dashboard.css\" rel=\"stylesheet\">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src=\"../../assets/js/ie8-responsive-file-warning.js\"></script><![endif]-->
    <script src=\"/public/js/ie-emulation-modes-warning.js\"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src=\"https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
      <script src=\"https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->
  </head>

  <body>

    <nav class=\"navbar navbar-inverse navbar-fixed-top\">
      <div class=\"container-fluid\">
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"/index/index\">ANWZ</a>
        </div>
        <div id=\"navbar\" class=\"navbar-collapse collapse\">
          <ul class=\"nav navbar-nav navbar-right\">
            <li><a href=\"#\">";
        // line 48
        echo twig_escape_filter($this->env, ($context["user_email"] ?? null), "html", null, true);
        echo "</a></li>
            <li><a href=\"/login/logout\">logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class=\"container-fluid\">
      <div class=\"row\">
        <div class=\"col-sm-3 col-md-2 sidebar\">
          <ul class=\"nav nav-sidebar\">
            <li class=\"active\"><a href=\"#\">文章管理 <span class=\"sr-only\">(current)</span></a></li>
            <li><a href=\"#\">文章列表</a></li>
            <li><a href=\"#\">添加文章</a></li>
          </ul>
          <ul class=\"nav nav-sidebar\">
            <li class=\"active\"><a href=\"#\">系统管理 <span class=\"sr-only\">(current)</span></a></li>
            <li><a href=\"/user/list\">用户管理</a></li>
            <li><a href=\"/role/list\">角色管理</a></li>
            <li><a href=\"\">权限管理</a></li>
          </ul>
          <ul class=\"nav nav-sidebar\">
            <li class=\"active\"><a href=\"#\">分类管理<span class=\"sr-only\">(current)</span></a></li>
            <li><a href=\"\">分类列表</a></li>
            <li><a href=\"\">添加分类</a></li>
          </ul>
        </div>
          <div class=\"col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 \" >
                  <div style=\"display: none\" class=\"alert alert-info closes\" role=\"alert\" data-dismiss=\"modal\" aria-label=\"Close\" >";
        // line 76
        echo twig_escape_filter($this->env, twig_getfash($this->env, $context, "message"), "html", null, true);
        echo " </div>
          </div>
          <div id=\"content\">
              ";
        // line 79
        $this->displayBlock('content', $context, $blocks);
        // line 82
        echo "          </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=\"https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js\"></script>
    <script>window.jQuery || document.write('<script src=\"/public/js/jquery-1.12.4.min.js\"><\\/script>')</script>
    <script src=\"https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src=\"/public/js/holder.min.js\"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src=\"/public/js/ie10-viewport-bug-workaround.js\"></script>
     <script>
        \$(function(\$) {
            var _closes = \$(\".closes\");
            var html = \$.trim(_closes.html());
            if(html.length >0){
                _closes.show();
            }else{
                _closes.hide();
            }
            _closes.click( function () { 
                 \$(this).fadeOut(\"slow\");
            });
             
             var time = setTimeout(function(){
                _closes.fadeOut(\"slow\");
             },3000);
          });
       
    </script>  
  </body>
</html>
";
    }

    // line 79
    public function block_content($context, array $blocks = array())
    {
        // line 80
        echo "              
              ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 80,  147 => 79,  108 => 82,  106 => 79,  100 => 76,  69 => 48,  20 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
<!DOCTYPE html>
<html lang=\"zh-CN\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name=\"description\" content=\"\">
    <meta name=\"author\" content=\"\">
    <link rel=\"icon\" href=\"/favicon.ico\">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href=\"https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css\" rel=\"stylesheet\">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href=\"/public/css/ie10-viewport-bug-workaround.css\" rel=\"stylesheet\">

    <!-- Custom styles for this template -->
    <link href=\"/public/css/dashboard.css\" rel=\"stylesheet\">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src=\"../../assets/js/ie8-responsive-file-warning.js\"></script><![endif]-->
    <script src=\"/public/js/ie-emulation-modes-warning.js\"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src=\"https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js\"></script>
      <script src=\"https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js\"></script>
    <![endif]-->
  </head>

  <body>

    <nav class=\"navbar navbar-inverse navbar-fixed-top\">
      <div class=\"container-fluid\">
        <div class=\"navbar-header\">
          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
          </button>
          <a class=\"navbar-brand\" href=\"/index/index\">ANWZ</a>
        </div>
        <div id=\"navbar\" class=\"navbar-collapse collapse\">
          <ul class=\"nav navbar-nav navbar-right\">
            <li><a href=\"#\">{{ user_email }}</a></li>
            <li><a href=\"/login/logout\">logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class=\"container-fluid\">
      <div class=\"row\">
        <div class=\"col-sm-3 col-md-2 sidebar\">
          <ul class=\"nav nav-sidebar\">
            <li class=\"active\"><a href=\"#\">文章管理 <span class=\"sr-only\">(current)</span></a></li>
            <li><a href=\"#\">文章列表</a></li>
            <li><a href=\"#\">添加文章</a></li>
          </ul>
          <ul class=\"nav nav-sidebar\">
            <li class=\"active\"><a href=\"#\">系统管理 <span class=\"sr-only\">(current)</span></a></li>
            <li><a href=\"/user/list\">用户管理</a></li>
            <li><a href=\"/role/list\">角色管理</a></li>
            <li><a href=\"\">权限管理</a></li>
          </ul>
          <ul class=\"nav nav-sidebar\">
            <li class=\"active\"><a href=\"#\">分类管理<span class=\"sr-only\">(current)</span></a></li>
            <li><a href=\"\">分类列表</a></li>
            <li><a href=\"\">添加分类</a></li>
          </ul>
        </div>
          <div class=\"col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 \" >
                  <div style=\"display: none\" class=\"alert alert-info closes\" role=\"alert\" data-dismiss=\"modal\" aria-label=\"Close\" >{{ getfash('message') }} </div>
          </div>
          <div id=\"content\">
              {% block content %}
              
              {% endblock %}
          </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=\"https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js\"></script>
    <script>window.jQuery || document.write('<script src=\"/public/js/jquery-1.12.4.min.js\"><\\/script>')</script>
    <script src=\"https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js\"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src=\"/public/js/holder.min.js\"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src=\"/public/js/ie10-viewport-bug-workaround.js\"></script>
     <script>
        \$(function(\$) {
            var _closes = \$(\".closes\");
            var html = \$.trim(_closes.html());
            if(html.length >0){
                _closes.show();
            }else{
                _closes.hide();
            }
            _closes.click( function () { 
                 \$(this).fadeOut(\"slow\");
            });
             
             var time = setTimeout(function(){
                _closes.fadeOut(\"slow\");
             },3000);
          });
       
    </script>  
  </body>
</html>
", "layout.html", "F:\\Projects\\ANWZ\\app\\view\\layout.html");
    }
}
