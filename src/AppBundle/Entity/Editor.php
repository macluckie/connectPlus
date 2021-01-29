<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Editor
 *
 * @ORM\Table(name="editor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EditorRepository")
 */
class Editor
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text",nullable=true)
     */
    private $details;


    /**
     * @var string
     *
     * @ORM\Column(name="banniere", type="string",nullable=true,  length=100)
     */
    private $banniere;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="text",nullable=true)
     *@Assert\NotBlank(message=" Champ obligatoire")
     *@Assert\Length(min = 10 , max = 10, maxMessage = "merci de saisir un numéro de téléphone valide à 10 chiffres")
     * @Assert\Regex(pattern = "/\d/",match = true,
     * message = "merci de saisir un numéro de téléphone valide à 10 chiffres")
     */
    private $phone;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set details.
     *
     * @param string $details
     *
     * @return Editor
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details.
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * Set phone.
     *
     * @param int $phone
     *
     * @return Editor
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone.
     *
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the value of banniere
     *
     * @return  string
     */ 
    public function getBanniere()
    {
        return $this->banniere;
    }

    /**
     * Set the value of banniere
     *
     * @param  string  $banniere
     *
     * @return  self
     */ 
    public function setBanniere(string $banniere)
    {
        $this->banniere = $banniere;

        return $this;
    }
}
