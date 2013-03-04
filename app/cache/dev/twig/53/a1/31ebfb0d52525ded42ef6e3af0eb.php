<?php

/* :default:navbox.html.twig */
class __TwigTemplate_53a131ebfb0d52525ded42ef6e3af0eb extends Twig_Template
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
        // line 2
        echo "
<div id=\"nav_container1\">
    <ul class=\"nav nav-pills nav-stacked\">
        <li><a href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
        echo "\"><div id=\"p\">2, Carnaby St.</div></a></li>
    </ul>
</div>

<div id=\"nav_container2\">
    <ul class=\"nav nav-pills nav-stacked\">
        <li><a href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_inbox_homepage"), "html", null, true);
        echo "\"><div id=\"p\">Inbox</div></a></li>
        <li><a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_expensemanager_homepage"), "html", null, true);
        echo "\"><div id=\"p\">Expenses</div></a></li>
        <li><a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_todos_homepage"), "html", null, true);
        echo "\"><div id=\"p\">To-dos</div></a></li>
        <li><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_shoppinglist_homepage"), "html", null, true);
        echo "\"><div id=\"p\">Shopping List</div></a></li>
        <li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
        echo "\"><div id=\"p\">Flatshare</div></a></li>
        <li><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
        echo "\"><div id=\"p\">Stats</div></a></li>
    </ul>
</div>

<div id=\"nav_container3\"><div id=\"nav_container3_bis\">
    <ul class=\"nav nav-pills nav-stacked\">
        <li><a href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_event_homepage"), "html", null, true);
        echo "\"><div id=\"p\">+ Create an Event ...</div></a></li>
    </ul>
</div></div>";
    }

    public function getTemplateName()
    {
        return ":default:navbox.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 15,  45 => 14,  41 => 13,  37 => 12,  24 => 5,  19 => 2,  74 => 20,  71 => 19,  62 => 22,  60 => 19,  47 => 11,  44 => 10,  38 => 7,  33 => 11,  30 => 5,  96 => 44,  89 => 40,  82 => 36,  78 => 35,  64 => 23,  61 => 22,  58 => 21,  55 => 16,  53 => 16,  42 => 10,  39 => 9,  32 => 6,  29 => 5,);
    }
}
