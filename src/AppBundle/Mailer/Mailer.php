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


    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating, $setFrom)
    {
        $this->template = $templating;
        $this->swift = $mailer;
        $this->setFrom = $setFrom;
    }

    public function sendReservation($data)
    {


        try {

            //var_dump($data);
            $message = (new \Swift_Message('Reservation'))
                ->setFrom($this->setFrom)
                ->setTo('dimitri.macluckie@gmail.com')
                ->setContentType("text/html")
                ->setBody(
                    $this->template->render(

                        'mail/mailreservation.html.twig',
                         $data
                    )
                );
        } catch (\Twig_Error_Loader $e) {
        } catch (\Twig_Error_Runtime $e) {
        } catch (\Twig_Error_Syntax $e) {
        }

        $this->swift->send($message);

        return true;
    }
}
