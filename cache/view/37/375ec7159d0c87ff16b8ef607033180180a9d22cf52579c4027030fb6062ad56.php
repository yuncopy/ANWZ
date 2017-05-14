<?php

/* role/add.html */
class __TwigTemplate_c56d67e6688d94596d77d8fe042730f0d9d128c2a65453056a4d4f0ecf85efdf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout.html", "role/add.html", 2);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "<div class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main\">

    <h2 class=\"sub-header\">角色添加</h2>
    <div class=\"row\">
        <div class=\"col-md-12\">
            <a  class=\"btn btn-primary pull-right\" href=\"/role/list\">返回列表</a>
        </div>
    </div>
    <div class=\"row\">
        <form class=\"form-horizontal\" action=\"/role/add\" method=\"post\">
            <div class=\"form-group\">
                <label for=\"inputName\" class=\"col-sm-2 control-label\">角色名称</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"name\" class=\"form-control\" id=\"inputName\" placeholder=\"角色名称\">
                </div>
            </div>
            <div class=\"form-group\">
                <label for=\"inputDescs\" class=\"col-sm-2 control-label\">角色描述</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"descs\" class=\"form-control\" id=\"inputDescs\" placeholder=\"角色描述\">
                </div>
            </div>
            <div class=\"form-group\">
                <div class=\"col-sm-offset-2 col-sm-6\">
                    <div class=\"checkbox\">
                        <label>
                            <input name=\"status\" type=\"checkbox\" value=\"1\" checked=\"checked\"> 开启
                        </label>
                    </div>
                </div>
            </div>
            <div class=\"form-group\">
                <div class=\"col-sm-offset-2 col-sm-6\">
                    <button type=\"submit\" class=\"btn btn-primary pull-right\">提交</button>
                </div>
            </div>
        </form>

    </div>>
</div>
";
    }

    public function getTemplateName()
    {
        return "role/add.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 5,  28 => 4,  11 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% extends \"layout.html\" %}

{% block content %}
<div class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main\">

    <h2 class=\"sub-header\">角色添加</h2>
    <div class=\"row\">
        <div class=\"col-md-12\">
            <a  class=\"btn btn-primary pull-right\" href=\"/role/list\">返回列表</a>
        </div>
    </div>
    <div class=\"row\">
        <form class=\"form-horizontal\" action=\"/role/add\" method=\"post\">
            <div class=\"form-group\">
                <label for=\"inputName\" class=\"col-sm-2 control-label\">角色名称</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"name\" class=\"form-control\" id=\"inputName\" placeholder=\"角色名称\">
                </div>
            </div>
            <div class=\"form-group\">
                <label for=\"inputDescs\" class=\"col-sm-2 control-label\">角色描述</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"descs\" class=\"form-control\" id=\"inputDescs\" placeholder=\"角色描述\">
                </div>
            </div>
            <div class=\"form-group\">
                <div class=\"col-sm-offset-2 col-sm-6\">
                    <div class=\"checkbox\">
                        <label>
                            <input name=\"status\" type=\"checkbox\" value=\"1\" checked=\"checked\"> 开启
                        </label>
                    </div>
                </div>
            </div>
            <div class=\"form-group\">
                <div class=\"col-sm-offset-2 col-sm-6\">
                    <button type=\"submit\" class=\"btn btn-primary pull-right\">提交</button>
                </div>
            </div>
        </form>

    </div>>
</div>
{% endblock %}", "role/add.html", "F:\\Projects\\ANWZ\\app\\view\\role\\add.html");
    }
}
