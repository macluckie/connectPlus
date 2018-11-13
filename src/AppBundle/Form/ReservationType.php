<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
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
        $builder->add('date', DateTimeType::class, ["label"=>"Date de réservation"])
            ->add('name', TextType::class, ["label"=>"prénom"])
            ->add('lastname', TextType::class, ["label"=>"Nom de famille"])
            ->add('mail', EmailType::class, ["label"=>"adresse email"])
            ->add('nombrepersonne', IntegerType::class, ["attr"=>["min"=>1, "max"=>10],"label"=>"Nombre de personne"])
            ->add('salle', EntityType::class, [
                "class"=>"AppBundle:Salle",
            ])

            ->add('game', EntityType::class, [
                "label"=>"jeux",
                "class"=>"AppBundle:Game",
                "attr"=>['class'=>'gameConsole',
                "value"=>'test']])
            ->add('console', EntityType::class, [
                "class"=>"AppBundle:Console",
                "attr"=>['class'=>'newSelect']
                
                
            ])
            ->add('reserver', SubmitType::class)

            ;
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
