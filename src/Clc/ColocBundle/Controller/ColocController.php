<?php

namespace Clc\ColocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Clc\ColocBundle\Form\Type\ColocType;
use Clc\ColocBundle\Entity\coloc;

class ColocController extends Controller
{
    public function newAction()
    {
        $coloc = new coloc();
        $coloc->setDate(new \Datetime('today'));
        $this->getUser()->setColoc($coloc);
        
        $form = $this->createForm(new ColocType, $coloc);
        
        $request = $this->get('request');
        
        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($coloc);
                $em->flush();
                
                $url = $this->get('router')->generate('clc_dashboard_homepage');
                return $this->redirect($url);
            }
        }
                
        return $this->render('ClcColocBundle:Creation:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    
}
