<?php
//src/Clc/ShoppinglistBundle/Services/Shoppinglist.php

namespace Clc\ShoppinglistBundle\Services;

class Shoppinglist {
    
    protected $em;
    
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function getByColoc($coloc, $state)
    {
        $em = $this->em;
         
        $query = $em->createQuery(
            'SELECT i FROM ClcShoppinglistBundle:item i WHERE i.coloc = :coloc AND i.state = :state ORDER BY i.addedDate DESC'
                                 );
        
        $query->setParameter('coloc', $coloc);
        $query->setParameter('state', $state);
        
        return $query->getResult();
    }
}

?>
