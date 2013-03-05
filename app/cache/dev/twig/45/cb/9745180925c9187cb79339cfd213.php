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
    <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/navbox.css"), "html", null, true);
        echo "\" type=\"text/css\" />
    
";
    }

    // line 12
    public function block_mainbox($context, array $blocks = array())
    {
        // line 13
        echo "    
<div id=\"pseudocontainer\">    
    <div id=\"mainbox\">
            <div id=\"leftbox\">
                ";
        // line 17
        $this->env->loadTemplate(":default:navbox.html.twig")->display($context);
        // line 18
        echo "            </div>   
        
            <div id=\"content\">
                ";
        // line 21
        $this->displayBlock('body', $context, $blocks);
        // line 24
        echo "            </div>  
        
    </div>
</div>

";
    }

    // line 21
    public function block_body($context, array $blocks = array())
    {
        // line 22
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
        return array (  79 => 22,  76 => 21,  67 => 24,  65 => 21,  60 => 18,  52 => 13,  49 => 12,  38 => 7,  33 => 6,  30 => 5,  64 => 23,  61 => 22,  58 => 17,  55 => 20,  53 => 19,  42 => 8,  39 => 9,  32 => 6,  29 => 5,);
    }
}
