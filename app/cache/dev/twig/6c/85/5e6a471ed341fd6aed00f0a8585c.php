<?php

/* ClcDashboardBundle::layout.html.twig */
class __TwigTemplate_6c855e6a471ed341fd6aed00f0a8585c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "      ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Dashboard
    ";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "
      <div id=\"content_top\">
          
          <div id=\"welcome-box\">
              <h1>Welcome Home !</h1>
          </div>
          
          <div id=\"quicklink-toolbar\">
              
              ";
        // line 19
        $this->env->loadTemplate("ClcExpensemanagerBundle:Default:addexpensemodal.html.twig")->display($context);
        // line 20
        echo "              ";
        $this->env->loadTemplate("ClcExpensemanagerBundle:Default:requestpaybackmodal.html.twig")->display($context);
        // line 21
        echo "              ";
        $this->env->loadTemplate("ClcTodosBundle:Default:addtodomodal.html.twig")->display($context);
        // line 22
        echo "              ";
        $this->env->loadTemplate("ClcShoppinglistBundle:Default:additemmodal.html.twig")->display($context);
        // line 23
        echo "              
              <button class=\"btn btn-primary\" href=\"#addexpensemodal\" data-toggle=\"modal\"><i class=\"icon-bookmark icon-white\"></i> Add Expense</button>
              <button class=\"btn btn-primary\" href=\"#requestpaybackmodal\"data-toggle=\"modal\"><i class=\"icon-bullhorn icon-white\"></i> Request Payback</button>
              <button class=\"btn btn-primary\" href=\"#addtodomodal\" data-toggle=\"modal\"><i class=\"icon-ok icon-white\"></i> Add To-do</button>
              <button class=\"btn btn-primary\" href=\"#additemmodal\" data-toggle=\"modal\"><i class=\"icon-shopping-cart icon-white\"></i> Add Shopping Item</button>
              
          </div>        
      </div>
      
      <div id=\"content_bottom\">
          <div id=\"expense-dashboard-container\" class=\"dashboard-container\">
<div class=\"expense-right-tag\">
                    </div>
                <div class=\"expense-left-tag\">
                </div>

                <div class=\"expense-upper\">
                </div>
                    
                <div class=\"expense-middle\">
                    <div class=\"expense-middle-tag\">
                       
                    </div>
                </div>
                 <div class=\"expense-lower\">
                 </div>
          </div>

          <div id=\"to-do-dashboard-container\" class=\"dashboard-container\">
                <div class=\"todo-upper\">
                </div>
                <div class=\"todo-middle\">
                    <div class=\"todo-middle-tag\">
                    </div>
                </div>
                <div class=\"todo-lower\">
                </div>
          </div>

          <div id=\"shopping-dashboard-container\" class=\"dashboard-container\">
                <div class=\"shopping-upper\">
                </div>
                <div class=\"shopping-middle\">
                    <div class=\"todo-middle-tag\">
                    </div>
                </div>
                <div class=\"shopping-lower\">
                </div>
          </div>
      </div>

     

    ";
    }

    public function getTemplateName()
    {
        return "ClcDashboardBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 23,  61 => 22,  58 => 21,  55 => 20,  53 => 19,  42 => 10,  39 => 9,  32 => 6,  29 => 5,);
    }
}
