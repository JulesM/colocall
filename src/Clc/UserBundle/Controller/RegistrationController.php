<?php
// src/Clc/UserBundle/Controller/RegistrationController.php

namespace Clc\UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class RegistrationController extends BaseController
{
    /**
     * Tell the user his account is now confirmed
     */
    public function confirmedAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        
        //Adding default picture
        $em = $this->container->get('doctrine.orm.entity_manager');
        $picture = $em ->getRepository('ClcUserBundle:profilepicture')
                       ->find(1);
        
        $user->setPicture($picture);
        $em->persist($user);
        $em->flush();
        
        //check if user accepted as Beta tester
        /*$repository = $em ->getRepository('ClcUserBundle:betaUser');
        $query = $repository->createQueryBuilder('b')
                            ->where('b.enabled = :enabled')
                            ->setParameter('enabled', true)
                            ->getQuery();

        $beta_list = $query->getResult();
        $beta_emails = array();

        foreach($beta_list as $beta_user) {
            $beta_emails[] = $beta_user->getEmail();
        }

        if (in_array($user->getEmail(),$beta_emails)) {
            $em->persist($user);
            $em->flush();
            
            $route = 'clc_dashboard_homepage';
            
        } else {
            $user->setPicture(null);
            $em->remove($user);
            $em->flush();
            
            $route = 'clc_welcome';
            
        }*/
        
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }
        
        $route = 'clc_dashboard_homepage';
        $url = $this->container->get('router')->generate($route);
        $response = new RedirectResponse($url);
        return $response;
    }
}