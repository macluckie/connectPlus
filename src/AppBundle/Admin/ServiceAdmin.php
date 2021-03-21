<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\Service;
use Exception;

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
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();
        $services = $em->getRepository(Service::class)->findAll();
        if (count($services) >= 3) 
        {
            throw new \Exception("impossible de créer plus de service");
            
        }

        $this->checkLengthDetails($service);
    }


    public function preValidate($service)
    {
        
       $this->checkLengthDetails($service);
    }



    private function checkLengthDetails(object $service)
    {
        if (strlen($service->getDetails()) >= 80) {
          throw new \Exception("taille details trop grande");
        }
    }

}
