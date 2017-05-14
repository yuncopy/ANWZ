<?php

/* role/edit.html */
class __TwigTemplate_6a290116806ba28caa63ede53de09314599a46743b896a24f6a1e4c6c40b23f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout.html", "role/edit.html", 2);
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

    <h2 class=\"sub-header\">角色编辑</h2>
    <div class=\"row\">
        <div class=\"col-md-12\">
            <a  class=\"btn btn-primary pull-right\" href=\"/role/list\">返回列表</a>
        </div>
    </div>
    <div class=\"row\">
        <form class=\"form-horizontal\" action=\"/role/edit\" method=\"post\">
            <input name=\"id\" type=\"hidden\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["role"] ?? null), "id", array()), "html", null, true);
        echo "\">
            <div class=\"form-group\">
                <label for=\"inputName\" class=\"col-sm-2 control-label\">角色名称</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"name\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["role"] ?? null), "name", array()), "html", null, true);
        echo "\" class=\"form-control\" id=\"inputName\" placeholder=\"角色名称\">
                </div>
            </div>
            <div class=\"form-group\">
                <label for=\"inputDescs\" class=\"col-sm-2 control-label\">角色描述</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"descs\" value=\"";
        // line 25
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), ($context["role"] ?? null), "descs", array()), "html", null, true);
        echo "\" class=\"form-control\" id=\"inputDescs\" placeholder=\"角色描述\">
                </div>
            </div>
            <div class=\"form-group\">
                <div class=\"col-sm-offset-2 col-sm-6\">
                    <div class=\"checkbox\">
                        <label>
                            <input name=\"status\" type=\"checkbox\" value=\"1\"  checked=\"checked\"> 开启
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
        return "role/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 25,  50 => 19,  43 => 15,  31 => 5,  28 => 4,  11 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% extends \"layout.html\" %}

{% block content %}
<div class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main\">

    <h2 class=\"sub-header\">角色编辑</h2>
    <div class=\"row\">
        <div class=\"col-md-12\">
            <a  class=\"btn btn-primary pull-right\" href=\"/role/list\">返回列表</a>
        </div>
    </div>
    <div class=\"row\">
        <form class=\"form-horizontal\" action=\"/role/edit\" method=\"post\">
            <input name=\"id\" type=\"hidden\" value=\"{{ role.id }}\">
            <div class=\"form-group\">
                <label for=\"inputName\" class=\"col-sm-2 control-label\">角色名称</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"name\" value=\"{{ role.name }}\" class=\"form-control\" id=\"inputName\" placeholder=\"角色名称\">
                </div>
            </div>
            <div class=\"form-group\">
                <label for=\"inputDescs\" class=\"col-sm-2 control-label\">角色描述</label>
                <div class=\"col-sm-6\">
                    <input type=\"text\" name=\"descs\" value=\"{{ role.descs }}\" class=\"form-control\" id=\"inputDescs\" placeholder=\"角色描述\">
                </div>
            </div>
            <div class=\"form-group\">
                <div class=\"col-sm-offset-2 col-sm-6\">
                    <div class=\"checkbox\">
                        <label>
                            <input name=\"status\" type=\"checkbox\" value=\"1\"  checked=\"checked\"> 开启
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
{% endblock %}", "role/edit.html", "F:\\Projects\\ANWZ\\app\\view\\role\\edit.html");
    }
}
