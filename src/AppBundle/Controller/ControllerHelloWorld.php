<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ControllerHelloWorld extends Controller
{
     /**
     * @Route("/helloWorld", name="helloworld")
     */
    public function helloWorld()
    {
        // return new Response(
        //     '<html><body> Hello World ! </body></html>'
        // );
        $em = $this->getDoctrine()->getManager();
        return $this->render('tests/helloWorld.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);

    }
}
