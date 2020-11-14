<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Console
 *
 * @ORM\Table(name="console")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConsoleRepository")
 */
class Console
{



    /**
     * @ORM\ManyToMany(targetEntity="Game", mappedBy="console")
     */
    private $game;


    /**
     *
     *@ORM\ManyToOne(targetEntity="Salle", inversedBy="Console")
     *@ORM\JoinColumn(name="Salle_id", referencedColumnName="id")
     */
    private $Salle;


    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="console")
     */
    private $reservations;

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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    public function __toString()
    {
        if ($this->getName() == null) {
            return 'false';
        }
        return $this->name;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=50, nullable=true)
     */
    private $marque;


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
     * Set name
     *
     * @param string $name
     *
     * @return Console
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
     * Set marque
     *
     * @param string $marque
     *
     * @return Console
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set salle
     *
     * @param \AppBundle\Entity\Salle $salle
     *
     * @return Console
     */
    public function setSalle(\AppBundle\Entity\Salle $salle = null)
    {
        $this->Salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return \AppBundle\Entity\Salle
     */
    public function getSalle()
    {
        return $this->Salle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Game = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Reservation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return Console
     */
    public function addGame(\AppBundle\Entity\Game $game)
    {
        $this->Game[] = $game;

        return $this;
    }

    /**
     * Remove game
     *
     * @param \AppBundle\Entity\Game $game
     */
    public function removeGame(\AppBundle\Entity\Game $game)
    {
        $this->Game->removeElement($game);
    }

    /**
     * Get game
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Add reservation
     *
     * @param \AppBundle\Entity\Reservation $reservation
     *
     * @return Console
     */
    public function addReservation(\AppBundle\Entity\Reservation $reservation)
    {
        $this->Reservation[] = $reservation;

        return $this;
    }

    /**
     * Remove reservation
     *
     * @param \AppBundle\Entity\Reservation $reservation
     */
    public function removeReservation(\AppBundle\Entity\Reservation $reservation)
    {
        $this->Reservation->removeElement($reservation);
    }

    /**
     * Get reservation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservation()
    {
        return $this->Reservation;
    }

    /**
     * Get reservations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReservations()
    {
        return $this->reservations;
    }
}
