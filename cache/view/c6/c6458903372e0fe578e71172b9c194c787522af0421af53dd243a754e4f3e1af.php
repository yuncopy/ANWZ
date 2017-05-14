<?php

/* user/list.html */
class __TwigTemplate_15bb4fa186a7ec91d59fd4f16a27f1436be320289d3d3b7aec880ceb69246bd4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("layout.html", "user/list.html", 2);
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

    <h2 class=\"sub-header\">角色列表</h2>
    <div class=\"row\">
        <div class=\"col-md-12\">
            <a  class=\"btn btn-primary pull-right\" href=\"/role/add\">添加角色</a>
        </div>
    </div>
    <div class=\"table-responsive\">
        
        <table class=\"table table-striped table-bordered\">
            <thead>
                <tr>
                    <th>序号</th>
                    <th>名称</th>
                    <th>描述</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             
                ";
        // line 26
        if ((twig_length_filter($this->env, ($context["list"] ?? null)) > 0)) {
            // line 27
            echo "                    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["list"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 28
                echo "                    <tr>
                        <td>";
                // line 29
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "id", array()));
                echo "</td>
                        <td>";
                // line 30
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "name", array()));
                echo "</td>
                        <td>";
                // line 31
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "descs", array()));
                echo "</td>
                        <td>
                            <a class=\"btn btn-info btn-xs\" href=\"/role/edit/id/";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "id", array()));
                echo "\" role=\"button\">编辑</a> 
                            <a class=\"btn btn-success btn-xs\" href=\"/role/edit/id/";
                // line 34
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->getSourceContext(), $context["item"], "id", array()));
                echo "\" role=\"button\">分配权限</a>
                        </td>
                    </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 38
            echo "                ";
        } else {
            // line 39
            echo "                    <tr>
                        <td colspan=\"4\">Not Found Data</td>
                    </tr>
                ";
        }
        // line 43
        echo "                
            </tbody>
        </table>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "user/list.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 43,  94 => 39,  91 => 38,  81 => 34,  77 => 33,  72 => 31,  68 => 30,  64 => 29,  61 => 28,  56 => 27,  54 => 26,  31 => 5,  28 => 4,  11 => 2,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("
{% extends \"layout.html\" %}

{% block content %}
<div class=\"col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main\">

    <h2 class=\"sub-header\">角色列表</h2>
    <div class=\"row\">
        <div class=\"col-md-12\">
            <a  class=\"btn btn-primary pull-right\" href=\"/role/add\">添加角色</a>
        </div>
    </div>
    <div class=\"table-responsive\">
        
        <table class=\"table table-striped table-bordered\">
            <thead>
                <tr>
                    <th>序号</th>
                    <th>名称</th>
                    <th>描述</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
             
                {% if list|length > 0 %}
                    {% for item in list %}
                    <tr>
                        <td>{{ item.id |e }}</td>
                        <td>{{ item.name |e }}</td>
                        <td>{{ item.descs |e }}</td>
                        <td>
                            <a class=\"btn btn-info btn-xs\" href=\"/role/edit/id/{{ item.id |e }}\" role=\"button\">编辑</a> 
                            <a class=\"btn btn-success btn-xs\" href=\"/role/edit/id/{{ item.id |e }}\" role=\"button\">分配权限</a>
                        </td>
                    </tr>
                    {% endfor %}
                {% else %}
                    <tr>
                        <td colspan=\"4\">Not Found Data</td>
                    </tr>
                {% endif %}
                
            </tbody>
        </table>
    </div>
</div>
{% endblock %}", "user/list.html", "F:\\Projects\\ANWZ\\app\\view\\user\\list.html");
    }
}
