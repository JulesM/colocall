<?php

/* :default:footer.html.twig */
class __TwigTemplate_060c21c29dbd6e777e440fc457d3d326 extends Twig_Template
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
<!DOCTYPE html>

";
        // line 5
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 6
            echo "
";
        } else {
            // line 8
            echo "
    <footer>
        <ul>
            <li><a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
            echo "\">About</a></li>
            <li><a href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
            echo "\">Jobs</li>
            <li><a href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
            echo "\">Investors</a></li>
            <li><a href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
            echo "\">Media</li>
            <li><a href=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
            echo "\">API</li>
            <li><a href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("clc_dashboard_homepage"), "html", null, true);
            echo "\">Blog</li>
        </ul>
    </footer>

";
        }
    }

    public function getTemplateName()
    {
        return ":default:footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 14,  43 => 13,  35 => 11,  30 => 8,  26 => 6,  24 => 5,  101 => 50,  88 => 40,  84 => 39,  73 => 35,  45 => 20,  19 => 2,  119 => 38,  116 => 37,  114 => 36,  111 => 35,  106 => 27,  103 => 26,  95 => 14,  89 => 8,  83 => 40,  81 => 38,  77 => 33,  75 => 36,  70 => 34,  68 => 26,  63 => 23,  61 => 30,  54 => 26,  52 => 14,  48 => 13,  44 => 12,  40 => 11,  36 => 10,  23 => 4,  315 => 264,  238 => 190,  202 => 157,  166 => 124,  130 => 91,  113 => 77,  96 => 63,  32 => 7,  29 => 6,  72 => 20,  67 => 18,  60 => 14,  55 => 16,  51 => 15,  46 => 9,  42 => 11,  39 => 12,  33 => 10,  31 => 9,  28 => 3,);
    }
}
