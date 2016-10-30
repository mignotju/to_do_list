<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Task;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ControllerListe1 extends Controller
{
  /**
  * @Route("/todo", name="todoAction")
  */
  public function todoAction(Request $request)
    {

      // Affichage de la liste
      try {
      $task = $this->getDoctrine()
        ->getRepository('AppBundle:Task')
        ->findAll();

      } catch(\Exception $e) {
        var_dump($e->getMessage());
      }


        // createFormBuilder is a shortcut to get the "form factory"
        // and then call "createBuilder()" on it

        $form = $this->createFormBuilder()
            ->add('task', TextType::class)
            ->getForm();

        $form->handleRequest($request);

       if ($form->isValid()) {
           $data = $form->getData();

           // ... perform some action, such as saving the data to the database
             $task = new Task();
             $task->setName($data["task"]);

             $em = $this->getDoctrine()->getManager();

             // tells Doctrine you want to (eventually) save the Task (no queries yet)
             $em->persist($task);

             // actually executes the queries (i.e. the INSERT query)
             $em->flush();

           //return new Response('Saved new task with id '.$task->getId());
           return $this->redirectToRoute('todoAction');
       }

        return $this->render('tests/todolist.html.twig', array(
            'form' => $form->createView(),
            'tasks' => $task,
        ));
    }


    //  /**
    //  * @Route("/liste", name="listeAction")
    //  */
    // public function listeAction()
    // {
    //   try {
    //   $task = $this->getDoctrine()
    //     ->getRepository('AppBundle:Task')
    //     ->findAll();
    //
    //     return $this->render('tests/liste1.html.twig', [
    //         'tasks' => $task,
    //     ]);
    //   } catch(\Exception $e) {
    //     var_dump($e->getMessage());
    //   }
    //
    //   //  var_dump($task); die;
    // }

    // /**
    // * @Route("/ajout", name="createAction")
    // */
    // public function createAction()
    // {
    //   $task = new Task();
    //   $task->setName('Dire merci à Kévin');
    //
    //   $em = $this->getDoctrine()->getManager();
    //
    //   // tells Doctrine you want to (eventually) save the Task (no queries yet)
    //   $em->persist($task);
    //
    //   // actually executes the queries (i.e. the INSERT query)
    //   $em->flush();
    //
    //   return new Response('Saved new task with id '.$task->getId());
    // }

}
