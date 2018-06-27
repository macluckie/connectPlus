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



        $reservation = new Reservation();
        $form = $this->createForm('AppBundle\Form\ReservationType', $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);

            $em->flush();


            $lastReservations = $em->getRepository('AppBundle:Reservation')->getLastReservation();

            $data = [];

            foreach($lastReservations as $lastReservation) {


                array_push($data,$lastReservation->getGame()->getName()
                    ,$lastReservation->getConsole()->getName()
                    ,$lastReservation->getSalle()->getName()
                    ,$lastReservation->getName()
                    , $lastReservation->getLastName()
                    ,$lastReservation->getMail()
                    ,$lastReservation->getNombrepersonne());

            }

            $mailer->SendReservation($data);





            // $mailer->SendReservation($data);



        }


            return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'games' => $games,
            'form' => $form->createView(),

        ]);
    }
}
