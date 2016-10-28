<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ControllerListe1 extends Controller
{
     /**
     * @Route("/liste", name="liste1")
     */
    public function liste1()
    {
      $task = $this->getDoctrine()
        ->getRepository('AppBundle:Task')
        ->findAll();

      //  var_dump($task); die;

        return $this->render('tests/liste1.html.twig', [
            'tasks' => $task,
        ]);

    }

}
