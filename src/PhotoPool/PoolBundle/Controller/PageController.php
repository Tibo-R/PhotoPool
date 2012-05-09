<?php

namespace PhotoPool\PoolBundle\Controller;

use PhotoPool\PoolBundle\Entity\Pool;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {

    	// $pool = new Pool();
     //    $pool->setTitle('Manuel Devier');

     //    $em = $this->getDoctrine()->getEntityManager();
     //    $em->persist($pool);
     //    $em->flush();
    	// $em = $this->getDoctrine()->getEntityManager();

        $pool = $this->getDoctrine()->getRepository('PhotoPoolPoolBundle:Pool')->find(1);

        if (!$pool) {
            throw $this->createNotFoundException('Oups something happened...');
        }

        return $this->render('PhotoPoolPoolBundle:Page:index.html.twig', array(
            'pool'      => $pool,
        ));
    }
}