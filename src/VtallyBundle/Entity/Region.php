<?php

namespace VtallyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity(repositoryClass="VtallyBundle\Repository\RegionRepository")
 */
class Region
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="VtallyBundle\Entity\Constituency", mappedBy="region", cascade={"remove", "persist"})
     */
    private $constituencies;
    
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
     * @return Region
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
     * Constructor
     */
    public function __construct()
    {
        $this->constituencies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add constituency
     *
     * @param \VtallyBundle\Entity\Constituency $constituency
     *
     * @return Region
     */
    public function addConstituency(\VtallyBundle\Entity\Constituency $constituency)
    {
        $this->constituencies[] = $constituency;

        return $this;
    }

    /**
     * Remove constituency
     *
     * @param \VtallyBundle\Entity\Constituency $constituency
     */
    public function removeConstituency(\VtallyBundle\Entity\Constituency $constituency)
    {
        $this->constituencies->removeElement($constituency);
    }

    /**
     * Get constituencies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConstituencies()
    {
        return $this->constituencies;
    }
}
