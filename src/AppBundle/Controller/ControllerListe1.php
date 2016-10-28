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
      try {
      $task = $this->getDoctrine()
        ->getRepository('AppBundle:Task')
        ->findAll();

        return $this->render('tests/liste1.html.twig', [
            'tasks' => $task,
        ]);
      } catch(\Exception $e) {
        var_dump($e->getMessage());
      }

      //  var_dump($task); die;



    }

}
