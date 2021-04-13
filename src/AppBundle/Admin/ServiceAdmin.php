<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\Service;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Exception;
use \Gumlet\ImageResize;

class ServiceAdmin extends AbstractAdmin
{


    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', TextType::class);
        $formMapper->add('details', TextType::class, ['attr'=>['maxlength' => 49]]);
        $formMapper->add('details2', TextType::class, ['attr'=>['maxlength' => 49]]);
        $formMapper->add('imageFile', FileType::class, ['required' => false]);

    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('details');
        $datagridMapper->add('details2');
        $datagridMapper->add('title');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('details');
        $listMapper->addIdentifier('details2');
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


    public function postUpdate($service)
    {
        $this->handlePictureService($service);
    }


    public function postPersist($service)
    {
        $this->handlePictureService($service);
    }


    public function preRemove($service)
    {
        try {
            unlink('upload/' . $service->getImageName());
            unlink('upload/resize' . $service->getImageName());
        }
        catch (Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    private function handlePictureService($service)
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();
        $imageInfo = getimagesize('upload/' . $service->getImageName());

        if (intval($imageInfo[0]) < 360) {
            unlink('upload/' . $service->getImageName());
            $service->setImageName(null);
            $em->persist($service);
            $em->flush();

            throw new \Exception("l'image est trop petite");
        }
        $image = new ImageResize('upload/' . $service->getImageName());
        $image->resize(360,240);
        $image->save('upload/resize' .$service->getImageName());
    }

    private function checkLengthDetails(object $service)
    {
        if (strlen($service->getDetails()) >= 80) {
            throw new \Exception("taille details trop grande");
        }
    }

}