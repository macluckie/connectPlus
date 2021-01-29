<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use FOS\UserBundle\Entity\User;
use Symfony\Component\Security\Core\SecurityContextInterface;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserManagerController extends Controller
{
    /**
     * @Route("/admin/dashboard" , name="dashboard")
     */
    public function emailAction(Request $request, SessionInterface $session, \Swift_Mailer $mailer)
    {

        if ($request->request->get('email') !== null) {
            $idUser = $this->getUser()->getId();
            $userManager = $this->get('fos_user.user_manager');
            $user =   $userManager->findUserBy(["id"=>$idUser]);

            $user->setEmail($request->request->get('email'));
            try {
                  $userManager->updateUser($user);


                  $message = $session->getFlashBag()->add('success', 'adresse email modifié');
            } catch (\Exception $e) {
                    $message = $session->getFlashBag()->add('error', 'saisir une autre adresse email');
            }


            return $this->render('sonataadmin.html.twig', array(

            'message'=>$message

            ));
        } else {
            return $this->render('sonataadmin.html.twig', array(



            ));
        }
    }
}
