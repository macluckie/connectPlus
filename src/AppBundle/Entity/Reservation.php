<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation
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
    *
    *@ORM\ManyToOne(targetEntity="Game", inversedBy="reservation")
    */
    private $game;

    /**
     * @var \datetime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="nombrepersonne", type="integer")
     */
    private $nombrepersonne;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity= "Console", inversedBy= "reservations")
     *
     */
    private $console;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Salle", inversedBy="reservations")
     *
     */
    private $salle;

    /**
     * @var \string
     *
     * @ORM\Column(name="name", type="string",length=100)
     */ 
    private $name;



    /**
     * @var \string
     *
     * @ORM\Column(name="lastname", type="string",length=100)
     */
    private $lastname;

    /**
     * @var \string
     *
     * @ORM\Column(name="mail", type="string",length=255)
     */
    private $mail;



    public function __construct()
    {
        $this->date= new\DateTime();
    }



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \Date $date
     *
     * @return Reservation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \Date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set nombrepersonne
     *
     * @param integer $nombrepersonne
     *
     * @return Reservation
     */
    public function setNombrepersonne($nombrepersonne)
    {
        $this->nombrepersonne = $nombrepersonne;

        return $this;
    }

    /**
     * Get nombrepersonne
     *
     * @return int
     */
    public function getNombrepersonne()
    {
        return $this->nombrepersonne;
    }



    /**
     * Set console
     *
     * @param \AppBundle\Entity\Console $console
     *
     * @return Reservation
     */
    public function setConsole(\AppBundle\Entity\Console $console = null)
    {
        $this->console = $console;

        return $this;
    }

    /**
     * Get console
     *
     * @return \AppBundle\Entity\Console
     */
    public function getConsole()
    {
        return $this->console;
    }

    /**
     * Set salle
     *
     * @param \AppBundle\Entity\Salle $salle
     *
     * @return Reservation
     */
    public function setSalle(\AppBundle\Entity\Salle $salle = null)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return \AppBundle\Entity\Salle
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Reservation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Reservation
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Reservation
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Get the value of game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set the value of game
     *
     * @return  self
     */
    public function setGame($game)
    {
        $this->game = $game;

        return $this;
    }
}
