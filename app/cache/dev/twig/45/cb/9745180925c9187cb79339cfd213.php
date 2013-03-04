<?php

/* ::base.html.twig */
class __TwigTemplate_45cb9745180925c9187cb79339cfd213 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frame.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'mainbox' => array($this, 'block_mainbox'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::frame.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/base.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/dashboard.css"), "html", null, true);
        echo "\" type=\"text/css\" />
";
    }

    // line 10
    public function block_mainbox($context, array $blocks = array())
    {
        // line 11
        echo "    
<div id=\"pseudocontainer\">    
    <div id=\"mainbox\">
            <div id=\"leftbox\">
                ";
        // line 15
        $this->env->loadTemplate(":default:navbox.html.twig")->display($context);
        // line 16
        echo "            </div>   
        
            <div id=\"content\">
                ";
        // line 19
        $this->displayBlock('body', $context, $blocks);
        // line 22
        echo "            </div>  
        
    </div>
</div>

";
    }

    // line 19
    public function block_body($context, array $blocks = array())
    {
        // line 20
        echo "                
                ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  74 => 20,  71 => 19,  62 => 22,  60 => 19,  47 => 11,  44 => 10,  38 => 7,  33 => 6,  30 => 5,  96 => 44,  89 => 40,  82 => 36,  78 => 35,  64 => 23,  61 => 22,  58 => 21,  55 => 16,  53 => 15,  42 => 10,  39 => 9,  32 => 6,  29 => 5,);
    }
}
