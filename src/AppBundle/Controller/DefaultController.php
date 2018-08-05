<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Repository\GameRepository;
use AppBundle\Entity\Reservation;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use AppBundle\Mailer\Mailer;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, Mailer $mailer)
    {






        $em = $this->getDoctrine()->getManager();
        $games = $em->getRepository('AppBundle:Game')->getLastGame();







            return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'games'=>$games,



            ]);
    }


    public function navbarAction(){

        $em = $this->getDoctrine()->getManager();

        $consoles = $em->getRepository('AppBundle:Console')->findAll();
        $games = $em->getRepository('AppBundle:Game')->findAll();

        return $this->render('/inc/navbar.html.twig',[


            'consoles'=>$consoles,
            'games'=>$games,


        ]);


    }
}
