<?php

/* :default:banner.html.twig */
class __TwigTemplate_f2fe57bac45166f396d673def08220e0 extends Twig_Template
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
<div id=\"banner1\">
    <img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/logo.png"), "html", null, true);
        echo "\" height=\"80%\" width=\"80%\" alt=\"\">
</div>
        
<div id=\"banner2\">
    
    ";
        // line 9
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 10
            echo "        
        <div id=\"settings_button\">      
            <div class=\"dropdown\">
                <a id=\"settings_dropdown_button\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">
                    Settings
                    <b class=\"caret\"></b>
                </a>
                <ul class=\"dropdown-menu\">
                    <!-- dropdown menu links -->
                    <li><a href=\"#\">Parameters</a></li>
                    <li><a href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
            echo "\">Log out</a></li>         
                </ul>
            </div>
        </div>
    
        <div id=\"home_button\">
            <a class=\"btn btn-link\" href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
            echo "\">Home</a>        
        </div>
    
        <div id=\"name_button\">
            <a class=\"btn btn-link\" href=\"";
            // line 30
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_profile"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "username"), "html", null, true);
            echo "</a>        
        </div>
    
    ";
        } else {
            // line 34
            echo "    
    ";
            // line 35
            if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
                // line 36
                echo "        <div>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message"), "html", null, true);
                echo "</div>
    ";
            }
            // line 38
            echo "
    <form class=\"form-inline\" action=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("login_check"), "html", null, true);
            echo "\" method=\"post\">
        <input type=\"text\" id=\"username\" class=\"input-small\" placeholder=\"Username\" name=\"_username\" value=\"";
            // line 40
            echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
            echo "\" />
        <input type=\"password\" id=\"password\" class=\"input-small\" placeholder=\"Password\" name=\"_password\" />

        <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" checked />
        <label class=\"checkbox\" for=\"remember_me\">Remember me</label>
    
        <button type=\"submit\" class=\"btn btn-success\">Sign in</button>
    </form>
        
    ";
        }
        // line 50
        echo "    
</div> ";
    }

    public function getTemplateName()
    {
        return ":default:banner.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 50,  88 => 40,  84 => 39,  73 => 35,  45 => 20,  19 => 2,  119 => 38,  116 => 37,  114 => 36,  111 => 35,  106 => 27,  103 => 26,  95 => 14,  89 => 8,  83 => 40,  81 => 38,  77 => 33,  75 => 36,  70 => 34,  68 => 26,  63 => 23,  61 => 30,  54 => 26,  52 => 14,  48 => 13,  44 => 12,  40 => 11,  36 => 10,  23 => 4,  315 => 264,  238 => 190,  202 => 157,  166 => 124,  130 => 91,  113 => 77,  96 => 63,  32 => 7,  29 => 6,  72 => 20,  67 => 18,  60 => 14,  55 => 12,  51 => 11,  46 => 9,  42 => 11,  39 => 10,  33 => 10,  31 => 9,  28 => 3,);
    }
}
