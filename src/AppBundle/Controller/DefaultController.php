<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {



      $defaultData = array('message' => 'Type your message here');
  $form = $this->createFormBuilder($defaultData)

      ->add('message', TextareaType::class)
      ->add('content', 'ckeditor')
      ->add('send', SubmitType::class)
      ->getForm();

  $form->handleRequest($request);

  if ($form->isSubmitted() && $form->isValid()) {
      // data is an array with "name", "email", and "message" keys
      $data = $form->getData();
  }
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'form' => $form->createview(),
        ]);
    }
}
