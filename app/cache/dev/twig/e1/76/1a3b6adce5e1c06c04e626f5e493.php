<?php

/* ::frame.html.twig */
class __TwigTemplate_e1761a3b6adce5e1c06c04e626f5e493 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'mainbox' => array($this, 'block_mainbox'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo " 
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
 
    <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
 
      <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" type=\"text/css\" />
      <link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/frame.css"), "html", null, true);
        echo "\" type=\"text/css\" />
      <link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/banner.css"), "html", null, true);
        echo "\" type=\"text/css\" />
      <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/footer.css"), "html", null, true);
        echo "\" type=\"text/css\" />
      ";
        // line 14
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 17
        echo "      
  </head>
 
  <body>
        <div id=\"banner\">
            ";
        // line 22
        $this->env->loadTemplate(":default:banner.html.twig")->display($context);
        // line 23
        echo "        </div>    
            

            ";
        // line 26
        $this->displayBlock('mainbox', $context, $blocks);
        // line 29
        echo "
        
        <div id=\"footer\" class=\"row\">
            ";
        // line 32
        $this->env->loadTemplate(":default:footer.html.twig")->display($context);
        // line 33
        echo "        </div>
 
  ";
        // line 35
        $this->displayBlock('javascripts', $context, $blocks);
        // line 40
        echo " 
  </body>
</html>";
    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "Coloc'all";
    }

    // line 14
    public function block_stylesheets($context, array $blocks = array())
    {
        echo "  
      
      ";
    }

    // line 26
    public function block_mainbox($context, array $blocks = array())
    {
        // line 27
        echo "        
            ";
    }

    // line 35
    public function block_javascripts($context, array $blocks = array())
    {
        // line 36
        echo "    ";
        // line 37
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
  ";
    }

    public function getTemplateName()
    {
        return "::frame.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  119 => 38,  116 => 37,  114 => 36,  111 => 35,  106 => 27,  103 => 26,  95 => 14,  89 => 8,  83 => 40,  81 => 35,  77 => 33,  75 => 32,  70 => 29,  68 => 26,  63 => 23,  61 => 22,  54 => 17,  52 => 14,  48 => 13,  44 => 12,  40 => 11,  36 => 10,  23 => 2,  315 => 264,  238 => 190,  202 => 157,  166 => 124,  130 => 91,  113 => 77,  96 => 63,  32 => 7,  29 => 6,  72 => 20,  67 => 18,  60 => 14,  55 => 12,  51 => 11,  46 => 9,  42 => 11,  39 => 10,  33 => 5,  31 => 8,  28 => 3,);
    }
}
