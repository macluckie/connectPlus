<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Editor;

class FooterController extends Controller
{

    public function getPhoneNumberAction()
    {
        $em = $this->getDoctrine()->getManager();
        $phoneNumber = $em->getRepository('AppBundle:Editor')->find(1)->getPhone();

        return $this->render('/inc/footer.html.twig', array(
            'phoneNumber'=>$phoneNumber,

        ));
    }
}
