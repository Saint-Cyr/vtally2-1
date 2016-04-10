<?php

namespace PaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaParty
 *
 * @ORM\Table(name="pa_party")
 * @ORM\Entity(repositoryClass="PaBundle\Repository\PaPartyRepository")
 */
class PaParty
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    private $site = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\DependentCandidate", mappedBy="paParty", cascade={"remove", "persist"})
     */
    private $dependentCandidates;
    
    public function __toString() {
        return $this->name;
    }
    
    public function increaseSiteNumber()
    {
        $this->site = $this->site + 1;
    }
    
    public function getSiteNumber()
    {
        return $this->site;
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
     * @return PaParty
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
        $this->dependentCandidates = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add dependentCandidate
     *
     * @param \PaBundle\Entity\DependentCandidate $dependentCandidate
     *
     * @return PaParty
     */
    public function addDependentCandidate(\PaBundle\Entity\DependentCandidate $dependentCandidate)
    {
        $this->dependentCandidates[] = $dependentCandidate;

        return $this;
    }

    /**
     * Remove dependentCandidate
     *
     * @param \PaBundle\Entity\DependentCandidate $dependentCandidate
     */
    public function removeDependentCandidate(\PaBundle\Entity\DependentCandidate $dependentCandidate)
    {
        $this->dependentCandidates->removeElement($dependentCandidate);
    }

    /**
     * Get dependentCandidates
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDependentCandidates()
    {
        return $this->dependentCandidates;
    }
}
