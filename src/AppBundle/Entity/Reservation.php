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
    *
    * @ORM\OneToOne(targetEntity="Game", mappedBy="Reservation")
    */
   private $Game;


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
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
     * @ORM\JoinColumn(name="console_id", referencedColumnName="id")
     */
    private $console;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Salle", inversedBy="reservations")
     * @ORM\JoinColumn(name="salle_id", referencedColumnName="id")
     */
    private $salle;


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
     * @param \DateTime $date
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
     * @return \DateTime
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
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return Reservation
     */
    public function setGame(\AppBundle\Entity\Game $game = null)
    {
        $this->Game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \AppBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->Game;
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
}
