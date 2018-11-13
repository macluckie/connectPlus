<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reservation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ReservationController extends Controller
{
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reservations = $em->getRepository('AppBundle:Reservation')->findAll();

        return $this->render('reservation/index.html.twig', array(
            'reservations' => $reservations,
        ));
    }

    
    public function newAction(Request $request)
    {
        $reservation = new Reservation();
        $form = $this->createForm('AppBundle\Form\ReservationType', $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();

            return $this->redirectToRoute('reservation_show', array('id' => $reservation->getId()));
        }

        return $this->render('reservation/new.html.twig', array(
            'reservation' => $reservation,
            'form' => $form->createView(),
        ));
    }

    
    public function showAction(Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);

        return $this->render('reservation/show.html.twig', array(
            'reservation' => $reservation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

  
    public function editAction(Request $request, Reservation $reservation)
    {
        $deleteForm = $this->createDeleteForm($reservation);
        $editForm = $this->createForm('AppBundle\Form\ReservationType', $reservation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reservation_edit', array('id' => $reservation->getId()));
        }

        return $this->render('reservation/edit.html.twig', array(
            'reservation' => $reservation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

   
    public function deleteAction(Request $request, Reservation $reservation)
    {
        $form = $this->createDeleteForm($reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reservation);
            $em->flush();
        }

        return $this->redirectToRoute('reservation_index');
    }

    
    private function createDeleteForm(Reservation $reservation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reservation_delete', array('id' => $reservation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
