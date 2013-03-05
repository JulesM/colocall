<?php

/* ClcExpensemanagerBundle:Default:addexpensemodal.html.twig */
class __TwigTemplate_8e69f59bb36439a7f0e2610e1095d24f extends Twig_Template
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
        return "ClcExpensemanagerBundle:Default:addexpensemodal.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  51 => 17,  47 => 16,  43 => 15,  35 => 13,  101 => 50,  88 => 40,  84 => 39,  81 => 38,  75 => 36,  70 => 34,  45 => 20,  24 => 5,  19 => 2,  115 => 37,  112 => 36,  110 => 35,  107 => 34,  102 => 30,  99 => 29,  91 => 14,  85 => 8,  77 => 34,  73 => 35,  71 => 29,  63 => 24,  54 => 26,  48 => 13,  44 => 12,  40 => 11,  36 => 10,  31 => 9,  23 => 2,  79 => 39,  76 => 21,  67 => 24,  65 => 25,  60 => 18,  52 => 14,  49 => 12,  38 => 7,  33 => 10,  30 => 5,  64 => 24,  61 => 30,  58 => 17,  55 => 18,  53 => 19,  42 => 8,  39 => 14,  32 => 6,  29 => 5,);
    }
}
