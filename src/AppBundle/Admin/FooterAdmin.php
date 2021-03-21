<?php
namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FooterAdmin extends AbstractAdmin
{
protected function configureFormFields(FormMapper $formMapper)
{
    $formMapper->add('email',TextType::class);
    $formMapper->add('phone',TextType::class);
    $formMapper->add('addresse',TextType::class);
    $formMapper->add('help', 'textarea', array('attr' => array('class' => 'ckeditor')));
    $formMapper->add('AboutUs', 'textarea', array('attr' => array('class' => 'ckeditor')));
    $formMapper->add('contactInformation',TextType::class);  
    $formMapper->add('facebook',TextType::class);  
    $formMapper->add('twitter',TextType::class);  
    $formMapper->add('linkedin',TextType::class);
    $formMapper->add('description',TextType::class);
}

protected function configureDatagridFilters(DatagridMapper $datagridMapper)
{
    $datagridMapper->add('email');
    $datagridMapper->add('phone');
    $datagridMapper->add('addresse');
    $datagridMapper->add('help');
    $datagridMapper->add('description');
    $datagridMapper->add('contactInformation');
    $datagridMapper->add('AboutUs');
    $datagridMapper->add('facebook');
    $datagridMapper->add('linkedin');
}

protected function configureListFields(ListMapper $listMapper)
{
    $listMapper->add('email');
    $listMapper->add('phone');
    $listMapper->add('addresse');
    $listMapper->add('help');
    $listMapper->add('description');
    $listMapper->add('linkedin');
    $listMapper->add('facebook');
    $listMapper->add('AboutUs');
    $listMapper->add('contactInformation');
}

public function prePersist($service)
{
    $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();
    $dataFooter = $em->getRepository(Footer::class)->findAll();
    if (count($dataFooter) == 1) 
    {
        throw new \Exception("les informations du pied de page sont déja renseignées.");        
    }
}
}