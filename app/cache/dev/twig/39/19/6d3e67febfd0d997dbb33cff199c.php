<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_39196d3e67febfd0d997dbb33cff199c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frame.html.twig");

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'mainbox' => array($this, 'block_mainbox'),
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

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 7
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/login.css"), "html", null, true);
        echo "\" type=\"text/css\" />
";
    }

    // line 10
    public function block_mainbox($context, array $blocks = array())
    {
        // line 11
        echo "
<div class=\"container\">    
  <div id=\"mainbox\">    

    <div id=\"block1\">
        <div id=\"middle_block1_ext\">
            <div id=\"middle_block1\">
                <div id=\"catchphrase_box\">
                    <div id=\"catchphrase1\">
                        <p>Live Together,<br><br><br><br>
                           Live Better</p>
                    </div>
                    <div id=\"catchphrase2\">   
                       <p>Start Using <strong>Coloc'all,</strong><br><br><br>
                          Today</p>
                    </div>
                </div>   
                          
                <div id=\"signin_box\">
                 <div id=\"signin_box_content\">  
                      <form>
                        <fieldset>
                          <legend>
                              <div id=\"legend\">
                                  New on Coloc'all ? Sign up for free !
                              </div>
                          </legend>
                          <label>Name</label>
                          <input type=\"text\" placeholder=\"Enter your full name\">
                          <label>E-mail</label>
                          <input type=\"text\" placeholder=\"Your e-mail here\">
                          <label>Password</label>
                          <input type=\"password\" placeholder=\"And choose a Password\">
                          <div id=\"signin_box_footer\">
                            <button type=\"submit\" class=\"btn btn-primary btn-medium\">Log in with facebook</button>
                            <button type=\"submit\" class=\"btn btn-warning btn-medium\">Sign up</button>
                          </div>
                        </fieldset>
                      </form>
                  </div>            
                </div>
            </div>        
        </div>
    </div>        

    <div id=\"block2\">
        <div class=\"row\">
            <div id=\"ribbon_container\" class=\"span12\">
            </div>
                
            <div id=\"feature_container\">
                <div id=\"feature\" class=\"span4\">
                    <img src=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/gandhi_round.png"), "html", null, true);
        echo "\" height=\"60%\" width=\"60%\" alt=\"\">
                    <h3>Manage Expenses</h3>
                    <p>- blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br></p>
                </div>
            
            
                <div id=\"feature\" class=\"span4\">
                    <img src=\"";
        // line 77
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/gandhi_round.png"), "html", null, true);
        echo "\" height=\"60%\" width=\"60%\" alt=\"\">
                    <h3>Payback Online</h3>
                    <p>- blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br></p>
                </div>
            
            
                <div id=\"feature\" class=\"span4\">
                    <img src=\"";
        // line 91
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/gandhi_round.png"), "html", null, true);
        echo "\" height=\"60%\" width=\"60%\" alt=\"\">
                    <h3>Manage To-dos</h3>
                    <p>- blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br>
                        - blablablaablablblablabalb</br></p>
                </div>
            </div>
                
            <div class=\"span10 offset1 lign\"></div>    
                
            <div class=\"span12\">
                <div id=\"myCarousel\" class=\"carousel slide\">
                           
                    <!-- Carousel items -->
                    <div class=\"carousel-inner\">
                      <div class=\"active item\">
                          <div id=\"item_container\">
                            <div id=\"text\">
                              <h3>Manage your common expenses</h3>    
                              <p> Lorem ipsum dolor sit amet,consectetur adipisicing elit, 
                                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                  reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
                                  officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div id=\"pic\">
                                <img src=\"";
        // line 124
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/visitor_homepage/Carousel/Carousel-blackboard.png"), "html", null, true);
        echo "\" alt=\"\">
                            </div>
                          </div>        
                      </div>
                      <div class=\"item\">
                          <div id=\"item_container\">
                            <div id=\"pic\">
                            </div>
                            <div id=\"text\">
                                <h3>Payback your friends online</h3>    
                                <p> Lorem ipsum dolor sit amet,consectetur adipisicing elit, 
                                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                  reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
                                  officia deserunt mollit anim id est laborum.</p>
                            </div>
                          </div>        
                      </div>
                      <div class=\"item\">
                          <div id=\"item_container\">
                            <div id=\"text\">
                                <h3>Manage your to-dos easily</h3>    
                                <p> Lorem ipsum dolor sit amet,consectetur adipisicing elit, 
                                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                  reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
                                  officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div id=\"pic\">
                                <img src=\"";
        // line 157
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/visitor_homepage/Carousel/Carousel-postit.jpg"), "html", null, true);
        echo "\" alt=\"\">
                            </div> 
                          </div>        
                      </div>
                      <div class=\"item\">
                          <div id=\"item_container\">
                            <div id=\"pic\">
                            </div>
                            <div id=\"text\">
                                <h3>Create dynamic shopping lists</h3>    
                                <p> Lorem ipsum dolor sit amet,consectetur adipisicing elit, 
                                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                  reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
                                  officia deserunt mollit anim id est laborum.</p>
                            </div>
                          </div>        
                      </div>
                      <div class=\"item\">
                          <div id=\"item_container\">
                            <div id=\"text\">
                              <h3>Host events with all your friends</h3>    
                              <p> Lorem ipsum dolor sit amet,consectetur adipisicing elit, 
                                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                  reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
                                  officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div id=\"pic\">
                                <img src=\"";
        // line 190
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/visitor_homepage/Carousel/Carousel-event-organizer.png"), "html", null, true);
        echo "\" alt=\"\">
                            </div>
                          </div>        
                      </div>
                      <div class=\"item\">
                          <div id=\"item_container\">
                            <div id=\"pic\">
                            </div>
                            <div id=\"text\">
                                <h3>Share tips with Coloc'all community</h3>    
                                <p> Lorem ipsum dolor sit amet,consectetur adipisicing elit, 
                                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                  reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
                                  officia deserunt mollit anim id est laborum.</p>
                            </div>
                          </div>        
                      </div>
                      <div class=\"item\">
                          <div id=\"item_container\">
                            <div id=\"text\">
                                <h3>Get fun statistics on your flatshare</h3>    
                                <p> Lorem ipsum dolor sit amet,consectetur adipisicing elit, 
                                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                  reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
                                  officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div id=\"pic\">
                            </div> 
                          </div>        
                      </div>
                      <div class=\"item\">
                          <div id=\"item_container\">
                            <div id=\"pic\">
                            </div>
                            <div id=\"text\">
                                <h3>Enjoy life as you should</h3>    
                                <p> Lorem ipsum dolor sit amet,consectetur adipisicing elit, 
                                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                                  reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                                  Excepteur sint occaecat cupidatat non proident, sunt in culpa qui 
                                  officia deserunt mollit anim id est laborum.</p>
                            </div>
                          </div>        
                      </div>      
                    </div>
                    <!-- Carousel nav -->
                    <a class=\"carousel-control left\" href=\"#myCarousel\" data-slide=\"prev\">&lsaquo;</a>
                    <a class=\"carousel-control right\" href=\"#myCarousel\" data-slide=\"next\">&rsaquo;</a>
                    
                    <div id=\"indicators_container\">
                        <ol class=\"carousel-indicators\">
                          <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
                          <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
                          <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
                          <li data-target=\"#myCarousel\" data-slide-to=\"3\"></li>
                          <li data-target=\"#myCarousel\" data-slide-to=\"4\"></li>
                          <li data-target=\"#myCarousel\" data-slide-to=\"5\"></li>
                          <li data-target=\"#myCarousel\" data-slide-to=\"6\"></li>
                          <li data-target=\"#myCarousel\" data-slide-to=\"7\"></li>
                        </ol>
                    </div>
                </div>
            </div>
            
            
            <div id=\"platform_container\" class=\"span12\">
                <img id=\"platform_pic\" src=\"";
        // line 264
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("img/visitor_homepage/Platform-list.jpg"), "html", null, true);
        echo "\" alt=\"\">
            </div>
                
            <div id=\"ribbon_container2\" class=\"span12\">
            </div>    
                
        </div>    
     </div>

    <div id=\"block3\"> 
        <div class=\"row\">
            <div id=\"block3_container\">
                <div class=\"whitebox\" id=\"trialbox\">
                </div>
                <div class=\"whitebox\" id=\"lignboxleft\">
                </div>
                <div id=\"timebox\">
                    <p>After 3 months</p>
                </div>
                <div class=\"whitebox\" id=\"lignboxright\">
                </div>
                <div class=\"whitebox\" id=\"freebox\">
                </div>
                <div class=\"whitebox\" id=\"paybox\">
                </div>
            </div>        
        </div>        
    </div>
      
  </div>
</div>        

  
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  315 => 264,  238 => 190,  202 => 157,  166 => 124,  130 => 91,  113 => 77,  96 => 63,  32 => 7,  29 => 6,  72 => 20,  67 => 18,  60 => 14,  55 => 12,  51 => 11,  46 => 9,  42 => 11,  39 => 10,  33 => 5,  31 => 4,  28 => 3,);
    }
}
