<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Console;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Console controller.
 *
 * @Route("console")
 */
class ConsoleController extends Controller
{
    /**
     * Lists all console entities.
     *
     * @Route("/", name="console_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $consoles = $em->getRepository('AppBundle:Console')->findAll();

        return $this->render('console/index.html.twig', array(
            'consoles' => $consoles,
        ));
    }

    /**
     * Creates a new console entity.
     *
     * @Route("/new", name="console_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $console = new Console();
        $form = $this->createForm('AppBundle\Form\ConsoleType', $console);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($console);
            $em->flush();

            return $this->redirectToRoute('console_show', array('id' => $console->getId()));
        }

        return $this->render('console/new.html.twig', array(
            'console' => $console,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a console entity.
     *
     * @Route("/{id}", name="console_show")
     * @Method("GET")
     */
    public function showAction(Console $console)
    {
        $deleteForm = $this->createDeleteForm($console);

        return $this->render('console/show.html.twig', array(
            'console' => $console,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing console entity.
     *
     * @Route("/{id}/edit", name="console_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Console $console)
    {
        $deleteForm = $this->createDeleteForm($console);
        $editForm = $this->createForm('AppBundle\Form\ConsoleType', $console);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('console_edit', array('id' => $console->getId()));
        }

        return $this->render('console/edit.html.twig', array(
            'console' => $console,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a console entity.
     *
     * @Route("/{id}", name="console_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Console $console)
    {
        $form = $this->createDeleteForm($console);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($console);
            $em->flush();
        }

        return $this->redirectToRoute('console_index');
    }

    /**
     * Creates a form to delete a console entity.
     *
     * @param Console $console The console entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Console $console)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('console_delete', array('id' => $console->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
