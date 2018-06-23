<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table(name="game")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameRepository")
 */
class Game
{


  /**
       *
       * @ORM\OneToOne(targetEntity="Reservation", inversedBy="Game")
       * @ORM\JoinColumn(name="reservation_id", referencedColumnName="id")
       */
  private $Reservation;



  /**
  * @ORM\ManyToMany(targetEntity="Console", mappedBy="Game")
  */
  private $Console;


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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="typegame", type="string", length=50)
     */
    private $typegame;


    public function __toString()
    {
        return $this->name;
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
     * Set name
     *
     * @param string $name
     *
     * @return Game
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
     * Set picture
     *
     * @param string $picture
     *
     * @return Game
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Game
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set typegame
     *
     * @param string $typegame
     *
     * @return Game
     */
    public function setTypegame($typegame)
    {
        $this->typegame = $typegame;

        return $this;
    }

    /**
     * Get typegame
     *
     * @return string
     */
    public function getTypegame()
    {
        return $this->typegame;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->console = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set reservation
     *
     * @param \AppBundle\Entity\Reservation $reservation
     *
     * @return Game
     */
    public function setReservation(\AppBundle\Entity\Reservation $reservation = null)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \AppBundle\Entity\Reservation
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * Add console
     *
     * @param \AppBundle\Entity\Console $console
     *
     * @return Game
     */
    public function addConsole(\AppBundle\Entity\Console $console)
    {
        $this->console[] = $console;

        return $this;
    }

    /**
     * Remove console
     *
     * @param \AppBundle\Entity\Console $console
     */
    public function removeConsole(\AppBundle\Entity\Console $console)
    {
        $this->console->removeElement($console);
    }

    /**
     * Get console
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConsole()
    {
        return $this->console;
    }
}
