<?php

namespace VtallyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Constituency
 *
 * @ORM\Table(name="constituency")
 * @ORM\Entity(repositoryClass="VtallyBundle\Repository\ConstituencyRepository")
 */
class Constituency
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
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;
    
    /**
     * @ORM\OneToMany(targetEntity="VtallyBundle\Entity\PollingStation", mappedBy="constituency", cascade={"remove", "persist"})
     */
    private $pollingStations;
    
    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\PaCandidate", mappedBy="constituency", cascade={"remove", "persist"})
     */
    private $paCandidates;
    
    /**
     * @ORM\ManyToOne(targetEntity="VtallyBundle\Entity\Region", inversedBy="constituencies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;
    
    /**
     * @ORM\OneToOne(targetEntity="VtallyBundle\Entity\CollationCenter", inversedBy="constituency")
     * @ORM\JoinColumn(nullable=true)
     */
    private $collationCenter;
    
    /**
     * @ORM\ManyToMany(targetEntity="PaBundle\Entity\PaParty", inversedBy="constituencies", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $paParties;
    
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
     * @return Constituency
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
     * Set code
     *
     * @param string $code
     *
     * @return Constituency
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pollingStations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->paParties = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pollingStation
     *
     * @param \VtallyBundle\Entity\PollingStation $pollingStation
     *
     * @return Constituency
     */
    public function addPollingStation(\VtallyBundle\Entity\PollingStation $pollingStation)
    {
        $this->pollingStations[] = $pollingStation;

        return $this;
    }

    /**
     * Remove pollingStation
     *
     * @param \VtallyBundle\Entity\PollingStation $pollingStation
     */
    public function removePollingStation(\VtallyBundle\Entity\PollingStation $pollingStation)
    {
        $this->pollingStations->removeElement($pollingStation);
    }

    /**
     * Get pollingStations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPollingStations()
    {
        return $this->pollingStations;
    }

    /**
     * Add paCandidate
     *
     * @param \PaBundle\Entity\PaCandidate $paCandidate
     *
     * @return Constituency
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
     * Set region
     *
     * @param \VtallyBundle\Entity\Region $region
     *
     * @return Constituency
     */
    public function setRegion(\VtallyBundle\Entity\Region $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \VtallyBundle\Entity\Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set collationCenter
     *
     * @param \VtallyBundle\Entity\CollationCenter $collationCenter
     *
     * @return Constituency
     */
    public function setCollationCenter(\VtallyBundle\Entity\CollationCenter $collationCenter = null)
    {
        $this->collationCenter = $collationCenter;

        return $this;
    }

    /**
     * Get collationCenter
     *
     * @return \VtallyBundle\Entity\CollationCenter
     */
    public function getCollationCenter()
    {
        return $this->collationCenter;
    }

    /**
     * Add paParty
     *
     * @param \PaBundle\Entity\PaParty $paParty
     *
     * @return Constituency
     */
    public function addPaParty(\PaBundle\Entity\PaParty $paParty)
    {
        $this->paParties[] = $paParty;

        return $this;
    }

    /**
     * Remove paParty
     *
     * @param \PaBundle\Entity\PaParty $paParty
     */
    public function removePaParty(\PaBundle\Entity\PaParty $paParty)
    {
        $this->paParties->removeElement($paParty);
    }

    /**
     * Get paParties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaParties()
    {
        return $this->paParties;
    }
}
