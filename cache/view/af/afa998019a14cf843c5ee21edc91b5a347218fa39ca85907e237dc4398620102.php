<?php

/* temp.html */
class __TwigTemplate_c437bfec19822e2c98f22ef4ba5e308455e2c8ccf79ab99198cf8654dd411a08 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title></title>
    </head>
    <body>
        <h3>";
        // line 13
        echo twig_escape_filter($this->env, ($context["data"] ?? null), "html", null, true);
        echo "</h3>
    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "temp.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  33 => 13,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title></title>
    </head>
    <body>
        <h3>{{ data }}</h3>
    </body>
</html>
", "temp.html", "F:\\Projects\\PhpProject1\\app\\view\\temp.html");
    }
}
