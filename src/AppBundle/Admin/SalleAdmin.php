<?php
/**
 * Created by PhpStorm.
 * User: macluckie
 * Date: 01/08/18
 * Time: 22:43
 */

namespace AppBundle\Admin;
use AppBundle\Entity\Reservation;
use AppBundle\Entity\Console;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Salle;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class SalleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class);


    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');

    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');

    }

}