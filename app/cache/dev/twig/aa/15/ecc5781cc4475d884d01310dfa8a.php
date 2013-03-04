<?php

/* ClcDashboardBundle:default:addexpensemodal.html.twig */
class __TwigTemplate_aa15ecc5781cc4475d884d01310dfa8a extends Twig_Template
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

<div class=\"modal hide fade\" id=\"addexpensemodal\" area-hidden=\"true\">

    <div class=\"modal-header\">
        <h3>Add your expense</h3>
    </div>

    <div class=\"modal-body\">
        <form>
            <label>Expense description</label>
            <input type=\"text\" class=\"span3\"/>
            <label>Amount</label>
            <div class=\"input-prepend\">
                <span class=\"add-on\">\$</span>
                <input class=\"span2\" id=\"prependedInput\" type=\"text\">
            </div>    
            <button type=\"submit\" class=\"btn btn-success\">Add expense</button>
            <button type=\"reset\" class=\"btn\">Clear</button>
        </form>

    </div>

    <div class=\"modal-footer\">
        <button class=\"btn\" data-dismiss=\"modal\" area-hidden=\"true\">Close</button>
    </div>
    
</div>";
    }

    public function getTemplateName()
    {
        return "ClcDashboardBundle:default:addexpensemodal.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  49 => 15,  45 => 14,  41 => 13,  37 => 12,  24 => 5,  19 => 2,  74 => 20,  71 => 19,  62 => 22,  60 => 19,  47 => 11,  44 => 10,  38 => 7,  33 => 11,  30 => 5,  96 => 44,  89 => 40,  82 => 36,  78 => 35,  64 => 23,  61 => 22,  58 => 21,  55 => 16,  53 => 16,  42 => 10,  39 => 9,  32 => 6,  29 => 5,);
    }
}
