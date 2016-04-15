<?php

namespace PrBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PrParty
 *
 * @ORM\Table(name="pr_party")
 * @ORM\Entity(repositoryClass="PrBundle\Repository\PrPartyRepository")
 */
class PrParty
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="candidate", type="string", length=255)
     */
    private $candidate;
    
    /**
     * @ORM\OneToOne(targetEntity="PrBundle\Entity\PrDependentCandidate", mappedBy="prParty", cascade={"remove", "persist"})
     */
    private $prDependentCandidate;
    
    /**
     * @ORM\OneToMany(targetEntity="PrBundle\Entity\PrVoteCast", mappedBy="prParty", cascade={"remove"})
     */
    private $prVoteCasts;
    
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
     * @return PrParty
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
     * Set candidate
     *
     * @param string $candidate
     *
     * @return PrParty
     */
    public function setCandidate($candidate)
    {
        $this->candidate = $candidate;

        return $this;
    }

    /**
     * Get candidate
     *
     * @return string
     */
    public function getCandidate()
    {
        return $this->candidate;
    }

    /**
     * Set prDependentCandidate
     *
     * @param \PrBundle\Entity\PrDependentCandidate $prDependentCandidate
     *
     * @return PrParty
     */
    public function setPrDependentCandidate(\PrBundle\Entity\PrDependentCandidate $prDependentCandidate = null)
    {
        $this->prDependentCandidate = $prDependentCandidate;

        return $this;
    }

    /**
     * Get prDependentCandidate
     *
     * @return \PrBundle\Entity\PrDependentCandidate
     */
    public function getPrDependentCandidate()
    {
        return $this->prDependentCandidate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prVoteCasts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add prVoteCast
     *
     * @param \PrBundle\Entity\PrVoteCast $prVoteCast
     *
     * @return PrParty
     */
    public function addPrVoteCast(\PrBundle\Entity\PrVoteCast $prVoteCast)
    {
        $this->prVoteCasts[] = $prVoteCast;

        return $this;
    }

    /**
     * Remove prVoteCast
     *
     * @param \PrBundle\Entity\PrVoteCast $prVoteCast
     */
    public function removePrVoteCast(\PrBundle\Entity\PrVoteCast $prVoteCast)
    {
        $this->prVoteCasts->removeElement($prVoteCast);
    }

    /**
     * Get prVoteCasts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrVoteCasts()
    {
        return $this->prVoteCasts;
    }
}
