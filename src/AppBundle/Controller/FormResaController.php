<?php

namespace AppBundle\Controller;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Entity\Reservation;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use AppBundle\Mailer\Mailer;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation\Response;





class FormResaController extends Controller
{
    /**
     * @Route("/form", name="form")
     */

    public function formAction(Request $request, Mailer $mailer)
    {







        $em = $this->getDoctrine()->getManager();
        $games = $em->getRepository('AppBundle:Game')->getLastGame();
        $consoles = $em->getRepository('AppBundle:Console')->findAll();

        $reservation = new Reservation();
        $form = $this->createForm('AppBundle\Form\ReservationType', $reservation);
        $form->handleRequest($request);

     //   var_dump($request->request->all());





        if ($form->isSubmitted() && $form->isValid()) {



            $em = $this->getDoctrine()->getManager();



            $em->persist($reservation);

            $em->flush();

            $mailer->sendReservation($request->request->get('appbundle_reservation'));


            if ($mailer->sendReservation($request->request->get('appbundle_reservation'))){



                return $this->redirectToRoute('homepage',["reservation"=>true]);
            }





        }

        return $this->render('/inc/modal.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'games' => $games,
            'consoles'=>$consoles,
            'form' => $form->createView(),


        ]);
    }


    /**
     * @Route("/formajax", name="form_ajax")
     */

    public function formAjaxAction(Request $request){


        $em = $this->getDoctrine()->getManager();

        $game = $em->getRepository('AppBundle:Game')->findOneByName($request->request->get('param'));

            $console = [];


        foreach ($game->getConsole()->toArray() as $gameConsole){


            array_push($console, $gameConsole->getName());

        }

        return new JsonResponse($console);

    }
}



