<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Editor;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CkEditorController extends Controller
{
    /**
     * @Route("/createForm",name="editor")
     */
    public function createFormAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $editor = $em->getRepository('AppBundle:Editor')->find(1);
        $details = $em->getRepository('AppBundle:Editor')->find(1)->getDetails();
        $phone = $em->getRepository('AppBundle:Editor')->find(1)->getPhone();



             $form = $this->createFormBuilder($editor)
                          ->add('phone', TextType::class, ['attr'=>['class'=>'phone']])
                          ->add('save', SubmitType::class, array('label' => 'modifier'))
                          ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
                     $phoneNumber = $form->getData()->getPhone();
                     $editor->setPhone($phoneNumber);
                    $em->flush();
        }




        return $this->render('CkEditor/create_form.html.twig', array(
          'details'=>$details,
          'phone' => $phone,
          'form' =>$form->createView(),

        ));
    }
}
