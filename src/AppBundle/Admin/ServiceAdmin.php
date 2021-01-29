<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\Service;



class ServiceAdmin extends AbstractAdmin
{


    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', TextType::class);
        $formMapper->add('details', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('details');
        $datagridMapper->add('title');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('details');
        $listMapper->addIdentifier('title');

    }


    public function prePersist($service)
    {
        echo '<pre>';
      var_dump($this->getConfigurationPool()->getContainer()->get('doctrine')->getManager()->getRepository(Service::class)->findAll());
      echo '<pre>';
      die('stop');
    }

}
