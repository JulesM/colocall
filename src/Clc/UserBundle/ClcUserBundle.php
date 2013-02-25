<?php
// src/Clc/UserBundle/ClcUserBundle.php
 
namespace Clc\UserBundle;
 
use Symfony\Component\HttpKernel\Bundle\Bundle;
 
class ClcUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}