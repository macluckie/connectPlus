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
  * @ORM\ManyToMany(targetEntity="Game", inversedBy="Console")
  * @ORM\JoinTable(name="Console_Game")
  */
  private $Game;


  /**
    *
    *@ORM\ManyToOne(targetEntity="Salle", inversedBy="Console")
    *@ORM\JoinColumn(name="Salle_id", referencedColumnName="id")
    */
     private $Salle;

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

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=50)
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
}