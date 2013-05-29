<?php
//src/Clc/TodosBundle/Services/Todos.php

namespace Clc\TodosBundle\Services;

class Todos {
    
    protected $em;
    
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function getByColoc($coloc, $state)
    {
        $em = $this->em;
        
        if ($state == 0) {
        
        $query = $em->createQuery(
            'SELECT t FROM ClcTodosBundle:task t WHERE t.coloc = :coloc AND t.state = :state ORDER BY t.date ASC'
                                 ); 
        }
        
        else {
         
        $query = $em->createQuery(
            'SELECT t FROM ClcTodosBundle:task t WHERE t.coloc = :coloc AND t.state = :state ORDER BY t.date DESC'
                                 );    
        }
        
        $query->setParameter('coloc', $coloc);
        $query->setParameter('state', $state);
        
        return $query->getResult();
    }
    
    public function getMine($user, $state)
    {
        $em = $this->em;
        
        if ($state == 0) {
        
        $query = $em->createQuery(
            'SELECT t FROM ClcTodosBundle:task t WHERE t.owner = :user AND t.state = :state ORDER BY t.date ASC'
                                 ); 
        }
        
        else {
         
        $query = $em->createQuery(
            'SELECT t FROM ClcTodosBundle:task t WHERE t.owner = :user AND t.state = :state ORDER BY t.date DESC'
                                 );    
        }
        
        $query->setParameter('user', $user);
        $query->setParameter('state', $state);
        
        return $query->getResult();
    }
    
    
}

?>
