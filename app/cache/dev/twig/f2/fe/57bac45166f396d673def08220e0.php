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
        // line 5
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
</div>
          
       ";
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
        return array (  101 => 50,  88 => 40,  84 => 39,  81 => 38,  75 => 36,  70 => 34,  45 => 20,  24 => 5,  19 => 2,  115 => 37,  112 => 36,  110 => 35,  107 => 34,  102 => 30,  99 => 29,  91 => 14,  85 => 8,  77 => 34,  73 => 35,  71 => 29,  63 => 24,  54 => 26,  48 => 13,  44 => 12,  40 => 11,  36 => 10,  31 => 9,  23 => 2,  79 => 39,  76 => 21,  67 => 24,  65 => 25,  60 => 18,  52 => 14,  49 => 12,  38 => 7,  33 => 10,  30 => 5,  64 => 23,  61 => 30,  58 => 17,  55 => 20,  53 => 19,  42 => 8,  39 => 9,  32 => 6,  29 => 5,);
    }
}
