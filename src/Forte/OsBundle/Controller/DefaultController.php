<?php

namespace Forte\OsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name, $total)
    {
        echo "Ola!!!"; die;
        
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository("OsBundle:Os");
        
        $os = $repo->findAll(
                #array(
            #'cliente'=> 'Mazzine')
            )
        ;
        
        return $this->render('OsBundle:Default:index.html.twig', array(
            'name'  => $name,
            'total' => $total,
            'os'    => $os
        ));
    }
}
