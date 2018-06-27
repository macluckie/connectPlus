<?php
/**
 * Created by PhpStorm.
 * User: macluckie
 * Date: 24/06/18
 * Time: 10:08
 */

namespace AppBundle\Mailer;


class Mailer
{
    private $template;
    private $swift;
    private $setFrom;


    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating,$setFrom)
    {
        $this->template = $templating;
        $this->swift = $mailer;


    }

    public function SendReservation($data){
            echo $this->setFrom;

        $message = (new \Swift_Message('Reservation'))
            ->setFrom($this->setFrom)
            ->setTo('dimitri.macluckie@gmail.com')
            ->setBody(
                $this->template->render(

                    'mail/mailreservation.html.twig',
                    $data
                ),
                'text/html');

        $this->swift->send($message);
    }

}