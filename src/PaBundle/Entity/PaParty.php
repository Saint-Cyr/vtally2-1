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

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    
    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\PaCandidate", mappedBy="paParty", cascade={"remove", "persist"})
     */
    private $paCandidates;
    
    /**
     * @ORM\ManyToMany(targetEntity="VtallyBundle\Entity\Constituency", mappedBy="paParties")
     */
    private $constituencies;
    
    public function __toString() {
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
        $this->paCandidates = new \Doctrine\Common\Collections\ArrayCollection();
        $this->constituencies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add paCandidate
     *
     * @param \PaBundle\Entity\PaCandidate $paCandidate
     *
     * @return PaParty
     */
    public function addPaCandidate(\PaBundle\Entity\PaCandidate $paCandidate)
    {
        $this->paCandidates[] = $paCandidate;

        return $this;
    }

    /**
     * Remove paCandidate
     *
     * @param \PaBundle\Entity\PaCandidate $paCandidate
     */
    public function removePaCandidate(\PaBundle\Entity\PaCandidate $paCandidate)
    {
        $this->paCandidates->removeElement($paCandidate);
    }

    /**
     * Get paCandidates
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaCandidates()
    {
        return $this->paCandidates;
    }

    /**
     * Add constituency
     *
     * @param \VtallyBundle\Entity\Constituency $constituency
     *
     * @return PaParty
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
