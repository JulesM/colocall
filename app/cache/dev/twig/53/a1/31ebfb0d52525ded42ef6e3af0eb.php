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
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_inbox_homepage"), "html", null, true);
        echo "\"><div id=\"p\">Inbox</div></a></li>
        <li><a href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_expensemanager_homepage"), "html", null, true);
        echo "\"><div id=\"p\">Expenses</div></a></li>
        <li><a href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_todos_homepage"), "html", null, true);
        echo "\"><div id=\"p\">To-dos</div></a></li>
        <li><a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_shoppinglist_homepage"), "html", null, true);
        echo "\"><div id=\"p\">Shopping List</div></a></li>
        <li><a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
        echo "\"><div id=\"p\">Flatshare</div></a></li>
        <li><a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
        echo "\"><div id=\"p\">Stats</div></a></li>
    </ul>
</div>
\t\t      
<div id=\"nav_container3\"><div id=\"nav_container3_bis\">
    <ul class=\"nav nav-pills nav-stacked\">
        <li><a href=\"";
        // line 24
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
        return array (  51 => 17,  47 => 16,  43 => 15,  35 => 13,  101 => 50,  88 => 40,  84 => 39,  81 => 38,  75 => 36,  70 => 34,  45 => 20,  24 => 5,  19 => 2,  115 => 37,  112 => 36,  110 => 35,  107 => 34,  102 => 30,  99 => 29,  91 => 14,  85 => 8,  77 => 34,  73 => 35,  71 => 29,  63 => 24,  54 => 26,  48 => 13,  44 => 12,  40 => 11,  36 => 10,  31 => 9,  23 => 2,  79 => 39,  76 => 21,  67 => 24,  65 => 25,  60 => 18,  52 => 14,  49 => 12,  38 => 7,  33 => 10,  30 => 5,  64 => 24,  61 => 30,  58 => 17,  55 => 18,  53 => 19,  42 => 8,  39 => 14,  32 => 6,  29 => 5,);
    }
}
