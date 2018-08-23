<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;









class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date')
            ->add('name')
            ->add('lastname')
            ->add('mail')
            ->add('nombrepersonne')
            ->add('salle')
            ->add('reserver', SubmitType::class)
            ->add('game',EntityType::class,[
                "class"=>"AppBundle:Game",])
            ;





                    $builder->get('game')->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {


                        $form = $event->getForm();

                        $data = $event->getData();

                        var_dump($data->getGame());






                        var_dump($data->getGame());

                        $form->getParent()->add('console',EntityType::class,[
                            'class'=>"AppBundle:Console",
                            'choices'=>$data




                        ]);
                    });




    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Reservation',


        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_reservation';
    }
}
