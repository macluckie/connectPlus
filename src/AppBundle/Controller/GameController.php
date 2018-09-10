<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Game controller.
 *
 * @Route("game")
 */
class GameController extends Controller
{


    /**
     * Finds and displays a game entity.
     *
     * @Route("/{id}", name="gamedetails")
     * @Method("GET")
     */
    public function showGameAction(Game $game)
    {
        $em = $this->getDoctrine()->getManager();



        return $this->render('game/gamedetails.html.twig', array(
            'game' => $game,

        ));
    }
}
