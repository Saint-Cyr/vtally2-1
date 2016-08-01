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
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\DependentCandidate", mappedBy="constituency", cascade={"remove", "persist"})
     */
    private $dependentCandidates;
    
    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\IndependentCandidate", mappedBy="constituency", cascade={"remove", "persist"})
     */
    private $independentCandidates;
    
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
    
    public function __toString() {
        return $this->name;
    }
    
    /**
     * @return array PaDepCandidate | PaIndCandidate
     */
    public function getCandidatesWithVoteCasts()
    {
        $depCandidates = $this->getDependentCandidates();
        $indCandidates = $this->getIndependentCandidates();
        $candidates = array();
        
        foreach ($depCandidates as $d){
            $candidates[] = $d;
        }
        
        foreach ($indCandidates as $i){
            $candidates[] = $i;
        }
        
        $candidates = $this->sortByTotalVoteCast($candidates);
        
        foreach ($candidates as $key => $item){
            $item->setOrder($key + 1);
        }
        
        return $candidates;
    }
    
    /**
     * 
     * @param array $candidates
     */
    public function sortByTotalVoteCast(array $objects)
    {
        //Get the total number of the items in the array
        $n = count($objects);
        for($i = 1; $i < $n; $i++){
            for($j = 0; $j < $n - 1; $j++){
                if($objects[$j]->getTotalVoteCast() > $objects[$j + 1]->getTotalVoteCast()){
                    $temp = $objects[$j];
                    $objects[$j] = $objects[$j + 1];
                    $objects[$j+1] = $temp;
                }
            }
        }
        
        return array_reverse($objects);
    }
    
    public function getWinner()
    {
        //return null if one Dependent or Independent candidate as been link to this consituency
        if((count($this->getDependentCandidates())) != 0 || (count($this->getIndependentCandidates()) != 0)){
            
            foreach ($this->getDependentCandidates() as $depCandidate){
                $tab[] = $depCandidate;
            }

            foreach ($this->getIndependentCandidates() as $indCandidate){
                $tab[] = $indCandidate;
            }

            $candidates = array_merge($tab);

            $winner = array('candidate' => null, 'voteCast' => null);

            foreach ($candidates as $candidate){
                if($winner['voteCast'] <= $candidate->getTotalVoteCast()){
                    $winner['candidate'] = $candidate;
                    $winner['voteCast'] = $candidate->getTotalVoteCast();
                }
            }

            //If election is not yet started
            $vote = false;

            foreach ($candidates as $candidate){
                if($candidate->getTotalVoteCast() != 0){
                    $vote = true;
                }
            }

            if($vote){
                return $winner['candidate'];
            }else{
                //If election does not yet start (everybody vote cast is 0), the return null
                return null;
            }
        }else{
            return null;
        }
                
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
     * Add dependentCandidate
     *
     * @param \PaBundle\Entity\DependentCandidate $dependentCandidate
     *
     * @return Constituency
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

    /**
     * Add independentCandidate
     *
     * @param \PaBundle\Entity\IndependentCandidate $independentCandidate
     *
     * @return Constituency
     */
    public function addIndependentCandidate(\PaBundle\Entity\IndependentCandidate $independentCandidate)
    {
        $this->independentCandidates[] = $independentCandidate;

        return $this;
    }

    /**
     * Remove independentCandidate
     *
     * @param \PaBundle\Entity\IndependentCandidate $independentCandidate
     */
    public function removeIndependentCandidate(\PaBundle\Entity\IndependentCandidate $independentCandidate)
    {
        $this->independentCandidates->removeElement($independentCandidate);
    }

    /**
     * Get independentCandidates
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIndependentCandidates()
    {
        return $this->independentCandidates;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pollingStations = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dependentCandidates = new \Doctrine\Common\Collections\ArrayCollection();
        $this->independentCandidates = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
