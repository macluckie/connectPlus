<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Footer
 *
 * @ORM\Table(name="footer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FooterRepository")
 */
class Footer
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
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     * 
     *  @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "votre email doit faire plus de  {{ limit }} charactères",
     *      maxMessage = "votre email ne doit pas faire plus de  {{ limit }} charactères"
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=15,nullable=true)
     *  @Assert\Regex(pattern="/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/", message="Veuillez renseigner un numéro valide") 
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="addresse", type="string", length=255,nullable=true)
     *   @Assert\Length(
     *      max = 50,
     *      maxMessage = "votre addresse ne doit pas faire plus de  {{ limit }} charactères"
     * )
     */
    private $addresse;


    /**
     * @var string
     *
     * @ORM\Column(name="help", type="text",  nullable=true)
     */
    private $help;


    /**
     * @var string
     *
     * @ORM\Column(name="AboutUs", type="text",  nullable=true)
     */
    private $AboutUs;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     *   @Assert\Length(
     *      max = 50,
     *      maxMessage = "votre description ne doit pas faire plus de  {{ limit }} charactères"
     * )
     */
    private $description;



    /**
     * @var string
     *
     * @ORM\Column(name="contactInformation", type="string", length=255, nullable=true)
     *   @Assert\Length(
     *      max = 50,
     *      maxMessage = "votre contactInformation ne doit pas faire plus de  {{ limit }} charactères"
     * )
     */
    private $contactInformation;


    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     *    @Assert\Length(
     *      max = 50,
     *      maxMessage = "votre facebook ne doit pas faire plus de  {{ limit }} charactères"
     * )
     */
    private $facebook;



    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     *   @Assert\Length(
     *      max = 50,
     *      maxMessage = "votre twitter ne doit pas faire plus de  {{ limit }} charactères"
     * )
     */
    private $twitter;


    /**
     * @var string
     *
     * @ORM\Column(name="linkedin", type="string", length=255, nullable=true)
     *   @Assert\Length(
     *      max = 50,
     *      maxMessage = "votre linkedin ne doit pas faire plus de  {{ limit }} charactères"
     * )
     */
    private $linkedin;
      

    /**
     * Get the value of email
     *
     * @return  string
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     *
     * @return  self
     */ 
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     *
     * @return  string
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @param  string  $phone
     *
     * @return  self
     */ 
    public function setPhone(string $phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of addresse
     *
     * @return  string
     */ 
    public function getAddresse()
    {
        return $this->addresse;
    }

    /**
     * Set the value of addresse
     *
     * @param  string  $addresse
     *
     * @return  self
     */ 
    public function setAddresse(string $addresse)
    {
        $this->addresse = $addresse;

        return $this;
    }

    /**
     * Get the value of help
     *
     * @return  string
     */ 
    public function getHelp()
    {
        return $this->help;
    }

    /**
     * Set the value of help
     *
     * @param  string  $help
     *
     * @return  self
     */ 
    public function setHelp(string $help)
    {
        $this->help = $help;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  string
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     *
     * @return  self
     */ 
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of facebook
     *
     * @return  string
     */ 
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set the value of facebook
     *
     * @param  string  $facebook
     *
     * @return  self
     */ 
    public function setFacebook(string $facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get the value of twitter
     *
     * @return  string
     */ 
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set the value of twitter
     *
     * @param  string  $twitter
     *
     * @return  self
     */ 
    public function setTwitter(string $twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get the value of AboutUs
     *
     * @return  string
     */ 
    public function getAboutUs()
    {
        return $this->AboutUs;
    }

    /**
     * Set the value of AboutUs
     *
     * @param  string  $AboutUs
     *
     * @return  self
     */ 
    public function setAboutUs(string $AboutUs)
    {
        $this->AboutUs = $AboutUs;

        return $this;
    }

    /**
     * Get the value of linkedin
     *
     * @return  string
     */ 
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * Set the value of linkedin
     *
     * @param  string  $linkedin
     *
     * @return  self
     */ 
    public function setLinkedin(string $linkedin)
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    /**
     * Get the value of contactInformation
     *
     * @return  string
     */ 
    public function getContactInformation()
    {
        return $this->contactInformation;
    }

    /**
     * Set the value of contactInformation
     *
     * @param  string  $contactInformation
     *
     * @return  self
     */ 
    public function setContactInformation(string $contactInformation)
    {
        $this->contactInformation = $contactInformation;

        return $this;
    }
}