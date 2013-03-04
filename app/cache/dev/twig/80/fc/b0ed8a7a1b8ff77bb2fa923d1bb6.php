<?php

/* ClcDashboardBundle:default:requestpaybackmodal.html.twig */
class __TwigTemplate_80fcb0ed8a7a1b8ff77bb2fa923d1bb6 extends Twig_Template
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

<div class=\"modal hide fade\" id=\"requestpaybackmodal\" area-hidden=\"true\">

    <div class=\"modal-header\">
        <h3>Payback request</h3>
    </div>

    <div class=\"modal-body\">
        <p>Are you sure you want to request a payback for the following balance ?</p>
        <p>You: -28€</p><br>
        <p>Mathilde: +123€€</p><br>
        <p>Josse: -87€</p><br>
        <p>Jack: -8€</p><br>
        <button class=\"btn btn-success\">Yes</button>
        <button class=\"btn\" data-dismiss=\"modal\" area-hidden=\"true\">No</button>
    </div>
    
</div>";
    }

    public function getTemplateName()
    {
        return "ClcDashboardBundle:default:requestpaybackmodal.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  49 => 15,  45 => 14,  41 => 13,  37 => 12,  24 => 5,  19 => 2,  74 => 20,  71 => 19,  62 => 22,  60 => 19,  47 => 11,  44 => 10,  38 => 7,  33 => 11,  30 => 5,  96 => 44,  89 => 40,  82 => 36,  78 => 35,  64 => 23,  61 => 22,  58 => 21,  55 => 16,  53 => 16,  42 => 10,  39 => 9,  32 => 6,  29 => 5,);
    }
}
