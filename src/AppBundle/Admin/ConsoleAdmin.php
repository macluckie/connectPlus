<?php
/**
 * Created by PhpStorm.
 * User: macluckie
 * Date: 29/07/18
 * Time: 02:53
 */

namespace AppBundle\Admin;
use AppBundle\Entity\Reservation;
use AppBundle\Entity\Console;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ConsoleAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class);
        $formMapper->add('marque', TextType::class);

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