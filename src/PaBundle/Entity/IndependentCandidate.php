<?php

namespace PaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndependentCandidate
 *
 * @ORM\Table(name="independent_candidate")
 * @ORM\Entity(repositoryClass="PaBundle\Repository\IndependentCandidateRepository")
 */
class IndependentCandidate
{
    CONST type = 'IndependentCandidate';
    
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
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="datetime", nullable=true)
     */
    private $dob;

    /**
     * @var int
     *
     * @ORM\Column(name="candidacyNumber", type="integer")
     */
    private $candidacyNumber;

    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\PaVoteCast", mappedBy="independentCandidate", cascade={"remove"})
     */
    private $paVoteCasts;
    
    /**
     * @ORM\ManyToOne(targetEntity="VtallyBundle\Entity\Constituency", inversedBy="independentCandidates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $constituency;
    
    public function getTotalVoteCast()
    {
        $total = 0;
        
        if(count($this->getPaVoteCasts())){
            
            //Count the votes only if the independent candidate has already recieve votes
            foreach ($this->getPaVoteCasts() as $voteCast){
                $total = $total + $voteCast->getFigureValue();
            }
            
            return $total;
        }
        
        return $total;    
    }
    
    public function isIndependentCandidate()
    {
        return true;
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
    
    public function __toString() 
    {
        if(!$this->getFirstName()){
            return 'New Independent Candidate';
        }  else {
            return $this->getFirstName();
        }
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return IndependentCandidate
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return IndependentCandidate
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     *
     * @return IndependentCandidate
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set candidacyNumber
     *
     * @param integer $candidacyNumber
     *
     * @return IndependentCandidate
     */
    public function setCandidacyNumber($candidacyNumber)
    {
        $this->candidacyNumber = $candidacyNumber;

        return $this;
    }

    /**
     * Get candidacyNumber
     *
     * @return int
     */
    public function getCandidacyNumber()
    {
        return $this->candidacyNumber;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->paVoteCasts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add paVoteCast
     *
     * @param \PaBundle\Entity\PaVoteCast $paVoteCast
     *
     * @return IndependentCandidate
     */
    public function addPaVoteCast(\PaBundle\Entity\PaVoteCast $paVoteCast)
    {
        $this->paVoteCasts[] = $paVoteCast;

        return $this;
    }

    /**
     * Remove paVoteCast
     *
     * @param \PaBundle\Entity\PaVoteCast $paVoteCast
     */
    public function removePaVoteCast(\PaBundle\Entity\PaVoteCast $paVoteCast)
    {
        $this->paVoteCasts->removeElement($paVoteCast);
    }

    /**
     * Get paVoteCasts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaVoteCasts()
    {
        return $this->paVoteCasts;
    }

    /**
     * Set constituency
     *
     * @param \VtallyBundle\Entity\Constituency $constituency
     *
     * @return IndependentCandidate
     */
    public function setConstituency(\VtallyBundle\Entity\Constituency $constituency)
    {
        $this->constituency = $constituency;

        return $this;
    }

    /**
     * Get constituency
     *
     * @return \VtallyBundle\Entity\Constituency
     */
    public function getConstituency()
    {
        return $this->constituency;
    }
}