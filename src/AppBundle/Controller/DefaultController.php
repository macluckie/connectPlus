<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Console;
use AppBundle\Entity\Footer;
use AppBundle\Entity\Service;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends Controller
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, SessionInterface $session)
    {
        // $details =  $this->em->getRepository('AppBundle:Editor')->find(1)->getDetails();
        if ($request->query->get('reservation') == true) {
            $messages = $session->getFlashBag()->add('success', 'demande de reservation envoyée');
        }
        $allGames =  $this->em->getRepository('AppBundle:Game')->findAll();
        $pictures = [];
        foreach ($allGames as $param) {
            $pictures[] = $param->getImageName();
        }
        
        return $this->render('default/index.html.twig', array(
                    'games' => $allGames,
                    'arrayPicture' =>$pictures[array_rand($pictures)],
                    'messages' => $messages = (empty($messages)) ? 'null' : $messages,
                    'services' => $this->em->getRepository(Service::class)->findAll(),
                    'footer'   => $this->em->getRepository(Footer::class)->findAll(),
                ));
    }


    
    /**
     * @Route("/faq", name="faq")
     */
    public function faq()
    {      
        return $this->render('FAQ/index.html.twig',[ 'footer'   => $this->em->getRepository(Footer::class)->findAll(),]);
    }


    /**
     * @Route("/about", name="about")
     */
    public function about()
    {      
        return $this->render('About/index.html.twig',[ 'footer'   => $this->em->getRepository(Footer::class)->findAll(),]);
    }








   

    /**
     * @Route("/gamebyconsole/{id}", name="gamebyconsole")
     */
    public function allGameConsoleAction(Request $request, Console $console)
    {
        $gameConsole = [];
        foreach ($console->getGame() as $value) {
            $gameConsole[] = $value->getName();
        }
        $games = $console->getGame();
        return $this->render('game/gamebyconsole.html.twig', [
            "gameConsole" => $gameConsole = (count($gameConsole) === 0) ? [] : $gameConsole,
            "console" => $console,
            "games" => $games,
        ]);
    }
}