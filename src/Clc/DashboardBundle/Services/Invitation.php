<?php
//src/Clc/DashboardBundle/Services/Invitation.php

namespace Clc\DashboardBundle\Services;

class Invitation {
    
    protected $em;
    
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function getInvitations($user)
    {
        $email = $user->getEmail();
        $em = $this->em;
        
        $query = $em->createQuery(
            'SELECT i FROM ClcColocBundle:invitation i WHERE i.email = :email'
                                 );
        $query->setParameter('email', $email);
        
        return $query->getResult();
    }    
}

?>
