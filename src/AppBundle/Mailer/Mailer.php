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
    private $fosuser;

    public function __construct(
        \Swift_Mailer $mailer,
        \Twig_Environment $templating,
        $setFrom,
        \FOS\UserBundle\Model\UserManagerInterface $fosuser
    ) {
        $this->template = $templating;
        $this->swift = $mailer;
        $this->setFrom = $setFrom;
        $this->fosuser = $fosuser;
    }

    public function sendReservation($data)
    {


        $userManager = $this->fosuser;

        $users = $userManager->findUsers();

        $setTo;
        foreach ($users as $user) {
            if (in_array('ROLE_ADMIN', $user->getRoles())) {
                $setTo =   $user->getEmail();
            }
        }

        try {
            $message = (new \Swift_Message('Reservation'))
                ->setFrom($this->setFrom)
                ->setTo($setTo)
                ->setContentType("text/html")
                ->setBody(
                    $this->template->render(

                        'mail/mailreservation.html.twig',
                        [
                         "data"=>$data]
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
