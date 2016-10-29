<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Task;

class ControllerListe1 extends Controller
{
     /**
     * @Route("/liste", name="listeAction")
     */
    public function listeAction()
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

    /**
    * @Route("/ajout", name="createAction")
    */
    public function createAction()
    {
      $task = new Task();
      $task->setName('Dire merci à Kévin');

      $em = $this->getDoctrine()->getManager();

      // tells Doctrine you want to (eventually) save the Task (no queries yet)
      $em->persist($task);

      // actually executes the queries (i.e. the INSERT query)
      $em->flush();

      return new Response('Saved new task with id '.$task->getId());
    }

}
