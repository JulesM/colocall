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
        <div class=\"container-fluid\" id=\"banner-container\">
                <div id=\"banner\">

                    ";
        // line 24
        $this->env->loadTemplate(":default:banner.html.twig")->display($context);
        // line 25
        echo "
                </div>
        </div>

            ";
        // line 29
        $this->displayBlock('mainbox', $context, $blocks);
        // line 32
        echo "
 
  ";
        // line 34
        $this->displayBlock('javascripts', $context, $blocks);
        // line 39
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

    // line 29
    public function block_mainbox($context, array $blocks = array())
    {
        // line 30
        echo "        
            ";
    }

    // line 34
    public function block_javascripts($context, array $blocks = array())
    {
        // line 35
        echo "    ";
        // line 36
        echo "    <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 37
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
        return array (  115 => 37,  112 => 36,  110 => 35,  107 => 34,  102 => 30,  99 => 29,  91 => 14,  85 => 8,  77 => 34,  73 => 32,  71 => 29,  63 => 24,  54 => 17,  48 => 13,  44 => 12,  40 => 11,  36 => 10,  31 => 8,  23 => 2,  79 => 39,  76 => 21,  67 => 24,  65 => 25,  60 => 18,  52 => 14,  49 => 12,  38 => 7,  33 => 6,  30 => 5,  64 => 23,  61 => 22,  58 => 17,  55 => 20,  53 => 19,  42 => 8,  39 => 9,  32 => 6,  29 => 5,);
    }
}
