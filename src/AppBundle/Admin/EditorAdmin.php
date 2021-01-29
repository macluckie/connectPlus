<?php
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

class EditorAdmin extends AbstractAdmin
{
protected function configureFormFields(FormMapper $formMapper)
{
$formMapper->add('details', 'textarea', array('attr' => array('class' => 'ckeditor')));
}

protected function configureDatagridFilters(DatagridMapper $datagridMapper)
{
$datagridMapper->add('details');
}

protected function configureListFields(ListMapper $listMapper)
{
$listMapper->addIdentifier('details');
}
}