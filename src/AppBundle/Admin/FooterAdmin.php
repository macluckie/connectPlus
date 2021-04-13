<?php

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AppBundle\Entity\Footer;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FooterAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('email', TextType::class, ['attr' => ['maxlength' => 50],'required' => false] );
        $formMapper->add('phone', TextType::class, ['attr' => ['maxlength' => 50], 'required' => false]);
        $formMapper->add('addresse', TextType::class, ['attr' => ['maxlength' => 50], 'required' => false]);
        $formMapper->add('help', 'textarea', array('attr' => array('class' => 'ckeditor'), 'required' => false));
        $formMapper->add('AboutUs', 'textarea', array('attr' => array('class' => 'ckeditor'), 'required' => false));
        $formMapper->add('contactInformation', TextType::class, ['attr' => ['maxlength' => 50], 'required' => false]);
        $formMapper->add('contactInformation2', TextType::class, ['attr' => ['maxlength' => 50], 'required' => false]);
        $formMapper->add('facebook', TextType::class, ['attr' => ['maxlength' => 50], 'required' => false]);
        $formMapper->add('twitter', TextType::class,  ['attr' => ['maxlength' => 50], 'required' => false]);
        $formMapper->add('linkedin', TextType::class, ['attr' => ['maxlength' => 50], 'required' => false]);
        $formMapper->add(
            'description',
            TextType::class,
            ['attr' => ['maxlength' => 50], 'required' => false]
          
        );
        $formMapper->add(
            'description2',
            TextType::class,
            ['attr' => ['maxlength' => 50], 'required' => false]
        );
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('email');
        $datagridMapper->add('phone');
        $datagridMapper->add('addresse');
        $datagridMapper->add('help');
        $datagridMapper->add('description');
        $datagridMapper->add('description2');
        $datagridMapper->add('contactInformation');
        $datagridMapper->add('contactInformation2');
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
        $listMapper->add('description2');
        $listMapper->add('linkedin');
        $listMapper->add('facebook');
        $listMapper->add('AboutUs');
        $listMapper->add('contactInformation');
        $listMapper->add('contactInformation2');
    }

    public function preUpdate($footer)
    {
        $this->checkFooterData($footer, 'Oups erreur de saisie', true);
    }

    public function prePersist($footer)
    {
        $this->checkFooterData($footer, 'les informations du pied de page sont déja renseignées.');
    }


    private function checkFooterData($footer, $message, $update = false)
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();
        $dataFooter = $em->getRepository(Footer::class)->findAll();

        $data = [];
        if (strlen($footer->getEmail()) > 50) {
            array_push($data, $footer->getEmail());
        }
        if (strlen($footer->getAddresse()) > 50) {
            array_push($data, $footer->getAddresse());
        }

        if (strlen($footer->getPhone()) > 50) {
            array_push($data, $footer->getPhone());
        }

        if (strlen($footer->getFacebook()) > 50) {
            array_push($data, $footer->getFacebook());
        }


        if (strlen($footer->getTwitter()) > 50) {
            array_push($data, $footer->getTwitter());
        }

        if (strlen($footer->getContactInformation()) > 50) {
            array_push($data, $footer->getContactInformation());
        }

        if (strlen($footer->getLinkedin()) > 50) {
            array_push($data, $footer->getLinkedin());
        }

        if ($update) {
            if (count($data) > 0) {
                throw new \Exception($message);
            }
        } else {
            if (count($dataFooter) >= 1 || count($data) > 0) {
                throw new \Exception($message);
            }
        }
    }
}