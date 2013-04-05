<?php
//src/Clc/InboxBundle/Services/Inbox.php

namespace Clc\InboxBundle\Services;

class Inbox {
    
    protected $em;
    
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function getMessages($coloc)
    {
        $em = $this->em;
        
        $query = $em->createQuery(
            'SELECT m FROM ClcInboxBundle:message m WHERE m.coloc = :coloc'
                                 ); 
        
        $query->setParameter('coloc', $coloc);
        
        return $query->getResult();
    }   
}

?>
