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
use AppBundle\Entity\Editor;


use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, SessionInterface $session)
    {
            $editor = new Editor();
            $em = $this->getDoctrine()->getManager();
            $getDetails = $em->getRepository('AppBundle:Editor')->find(1);

          $dataEditor = $request->request->get('editor1');

        if (isset($dataEditor)) {
            $getDetails->setDetails($dataEditor);

            $em->flush();
        }

          $details = $em->getRepository('AppBundle:Editor')->find(1)->getDetails();

        if ($request->query->get('reservation')==true) {
            $messages = $session->getFlashBag()->add('success', 'demande de reservation envoyée');
        }

        $games = $em->getRepository('AppBundle:Game')->getLastGame();

       

       
             $allGames = $em->getRepository('AppBundle:Game')->findAll();


                $pictures = [];

        foreach ($allGames as $param) {
             $pictures[] = $param->getImageName();
        }
          

            $pictureRamdom1 = $pictures[array_rand($pictures, 1)];
            $pictureRamdom2 = $pictures[array_rand($pictures, 1)];
            $pictureRamdom3 = $pictures[array_rand($pictures, 1)];


        return $this->render('default/index.html.twig', array(
            'games'=>$games,
            'pictureRamdom1'=>$pictureRamdom1,
            'pictureRamdom2'=>$pictureRamdom2,
            'pictureRamdom3'=>$pictureRamdom3,
            'messages'=>$messages=(empty($messages)) ? 'null' : $messages,
            'details'=>$details,
            


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

    /**
     * @Route("/gamebyconsole/{id}", name="gamebyconsole")
     */
    public function allGameConsoleAction(Request $request, Console $console)
    {



         $em = $this->getDoctrine()->getManager();



        $gameConsole = [];


        foreach ($console->getGame() as $value) {
            $gameConsole[] = $value->getName();
        }

        $games = $console->getGame();


         return $this->render('game/gamebyconsole.html.twig', [

             "gameConsole"=>$gameConsole=(count($gameConsole) === 0) ? [] : $gameConsole,
             "console"=>$console,
             "games"=>$games,


         ]);
    }
}
