<?php
/**
 * Created by PhpStorm.
 * User: macluckie
 * Date: 06/07/18
 * Time: 13:15
 */

namespace AppBundle\Admin;

use AppBundle\Entity\Console;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class GameAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class);
        $formMapper->add('video', TextType::class, ["label"=>'video: link youtube']);
        $formMapper->add('typegame', TextType::class);
        $formMapper->add('console', EntityType::class, array(
        'class' => Console::class,
        'choice_label' => 'name'
        ))
        ;
        $formMapper->add('imageFile', FileType  ::class, ['required'=>false]);
        $formMapper->add('commentaire', TextareaType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
        $datagridMapper->add('typegame');
        $datagridMapper->add('commentaire');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
        $listMapper->addIdentifier('typegame');
        $listMapper->addIdentifier('commentaire');
    }
}