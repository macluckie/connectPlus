<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Repository\GameRepository;
use AppBundle\Entity\Reservation;
use AppBundle\Entity\Salle;
use AppBundle\Entity\Console;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use AppBundle\Mailer\Mailer;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, SessionInterface $session)
    {




        if ($request->query->get('reservation')==true) {
            $messages = $session->getFlashBag()->add('success', 'demande de reservation envoyée');
        }

        $em = $this->getDoctrine()->getManager();
        $games = $em->getRepository('AppBundle:Game')->getLastGame();


        $maxId = $em->getRepository('AppBundle:Game')->getMaxId();

        foreach ($maxId as $value) {
            $maxId= $value->getId();
        }

        $ramdomPicture = $em->getRepository('AppBundle:Game')->find(rand(1, $maxId));
        $ramdomPicture2= $em->getRepository('AppBundle:Game')->find(rand(1, $maxId));
        $ramdomPicture3 = $em->getRepository('AppBundle:Game')->find(rand(1, $maxId));









        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'games'=>$games,
            'ramdomPicture'=>$ramdomPicture,
            'ramdomPicture2'=>$ramdomPicture2,
            'ramdomPicture3'=>$ramdomPicture3,
            'messages'=>$messages=(empty($messages)) ? 'null' : $messages,


        ));
    }


    public function navbarAction()
    {

        $em = $this->getDoctrine()->getManager();

        $consoles = $em->getRepository('AppBundle:Console')->findAll();
        $games = $em->getRepository('AppBundle:Game')->getLastSevenGame();

        return $this->render('/inc/navbar.html.twig', [


            'consoles'=>$consoles,
            'games'=>$games,


        ]);
    }
}
