<?php

namespace VtallyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PaBundle\Entity\IndependentCandidate;
use PaBundle\Entity\DependentCandidate;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * PollingStation
 *
 * @ORM\Table(name="polling_station")
 * @ORM\Entity(repositoryClass="VtallyBundle\Repository\PollingStationRepository")
 */
class PollingStation
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
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    /**
     * @var string
     *
     * @ORM\Column(name="presidential", type="boolean")
     */
    private $presidential;
    
    /**
     * @var string
     *
     * @ORM\Column(name="parliamentary", type="boolean")
     */
    private $parliamentary;
    
    /**
     * @var string
     *
     * @ORM\Column(name="parliamentaryEdited", type="boolean")
     */
    private $parliamentaryEdited;
    
    /**
     * @var string
     *
     * @ORM\Column(name="presidentialPinkSheet", type="boolean")
     */
    private $presidentialPinkSheet;
    
    /**
     * @var string
     *
     * @ORM\Column(name="parliamentaryPinkSheet", type="boolean")
     */
    private $parliamentaryPinkSheet;
    
    /**
     * @var string
     *
     * @ORM\Column(name="parliamentaryPinkSheetEdited", type="boolean")
     */
    private $parliamentaryPinkSheetEdited;
    
    /**
     * @var string
     *
     * @ORM\Column(name="presidentialPinkSheetEdited", type="boolean")
     */
    private $presidentialPinkSheetEdited;
    
    /**
     * @var string
     *
     * @ORM\Column(name="presidentialEdited", type="boolean", nullable=true)
     */
    private $presidentialEdited;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    private $code;
    
    /**
     * @var string
     *
     * @ORM\Column(name="voterNumber", type="integer", length=255, unique=false)
     */
    private $voterNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=255, nullable=true)
     */
    private $district;
    
    /**
     * @ORM\ManyToOne(targetEntity="VtallyBundle\Entity\Constituency", inversedBy="pollingStations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $constituency;
    
    /**
     * @ORM\OneToMany(targetEntity="PrBundle\Entity\PrNotification", mappedBy="pollingStation", cascade={"remove"})
     */
    private $prNotifications;
    
    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\PaNotification", mappedBy="pollingStation", cascade={"remove"})
     */
    private $paNotifications;
    
    /**
     * @ORM\OneToMany(targetEntity="PrBundle\Entity\PrVoteCast", mappedBy="pollingStation", cascade={"persist", "remove"})
     */
    private $prVoteCasts;
    
    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Entity\User", mappedBy="pollingStation", cascade={"remove", "persist"})
     */
    private $users;
    
    /**
     * @ORM\OneToMany(targetEntity="PrBundle\Entity\PrEditedVoteCast", mappedBy="pollingStation", cascade={"remove"})
     */
    private $prEditedVoteCasts;
    
    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\PaVoteCast", mappedBy="pollingStation", cascade={"remove"})
     */
    private $paVoteCasts;
    
    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\PaEditedVoteCast", mappedBy="pollingStation", cascade={"remove"})
     */
    private $paEditedVoteCasts;
    
    /**
     * @ORM\OneToOne(targetEntity="PrBundle\Entity\PrPinkSheet", inversedBy="pollingStation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $prPinkSheet;
    
    /**
     * @ORM\OneToOne(targetEntity="PaBundle\Entity\PaPinkSheet", inversedBy="pollingStation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $paPinkSheet;
    
    /**
     * @ORM\OneToOne(targetEntity="VtallyBundle\Entity\ReturningOfficer", inversedBy="pollingStation")
     * @ORM\JoinColumn(nullable=true)
     */
    private $returningOfficer;
    
    public function __toString() 
    {
        return $this->name;
    }
    
    /**
     * @Assert\IsTrue(message = "Polling Station inactif or it allready has 2 verifiers")
     */
    public function isVerifierValid()
    {
       if((count($this->getUsers()) < 2) && ($this->isActive())){
           return true;
       }
       
       return false;
    }
    
    /**
     * 
     * @return type UserBundle:User
     */
    public function getFirstVerifier()
    {
        //Get all the linked users (1st & 2nd verifier)
        $users = $this->getUsers();
        foreach ($users as $user){
            if($user->getVerifierType()){
                return $user;
            }
        }
    }
    
    /**
     * @return UserBundle:User Description
     */
    public function getSecondVerifier()
    {
        //Get all the linked users (1st & 2nd verifier)
        $users = $this->getUsers();
        foreach ($users as $user){
            if(!$user->getVerifierType()){
                return $user;
            }
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
     * @return PollingStation
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
     * @return PollingStation
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
     * Set district
     *
     * @param string $district
     *
     * @return PollingStation
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set constituency
     *
     * @param \VtallyBundle\Entity\Constituency $constituency
     *
     * @return PollingStation
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
    

    /**
     * Add prVoteCast
     *
     * @param \PrBundle\Entity\PrVoteCast $prVoteCast
     *
     * @return PollingStation
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
    
    /**
     * @return array('partyName' => 'voteCastValue') For API purpose
     * in order to check whether a the votes data structure sent by
     * the second verifier match this one or not
     */
    public function getPresidentialVoteCastForAPI()
    {
        //Prepare the Data Structure
        $dataStructure = array();
        //Build the Data structure
        foreach ($this->getPrVoteCasts() as $vote){
            $dataStructure[$vote->getPrParty()->getName()] = $vote->getFigureValue();
        }
        
        return $dataStructure;
    }
    
    /**
     * @return boolean return true if votes matched
     * and false else
     */
    public function isPresidentialVoteCastsMatch(array $prVotes)
    {
        if($prVotes == $this->getPresidentialVoteCastForAPI()){
            
            return true;
        }
        
        return false;
    }
    
    /**
     * @param IndependentCandidate|DependentCandidate $candidate
     * @return PaVoteCast regardless of the type of the parameter (Ind or Dep candidate)
     */
    public function getOneParliamentaryVoteCast($candidate)
    {
        if($candidate instanceof IndependentCandidate){
            //independent candidate case
            //collect all the voteCasts
            foreach ($this->getPaVoteCasts() as $vote){
                if($candidate === $vote->getIndependentCandidate()){
                    return $vote;
                }
            }
            
            
        }elseif($candidate instanceof DependentCandidate){
            //DependentCandidate
            //coloct all the voteCasts
            foreach ($this->getPaVoteCasts() as $vote){
                if($candidate === $vote->getDependentCandidate()){
                    return $vote;
                }
            }
            
        }
        
        return array('parameter must be instance of IndependentCandidate or DependentCandidate');
    }
    
    /**
     * @return an instance of VtallyBundle\Entity\PrVoteCast if in it the given parameter does not match 
     * it related item in the DB. If there is not change, return false
     * @param array in the format array($partyName => $voteValue)
     */
    public function isOnePresidentialVoteCastChanged(array $inputData)
    {
        foreach ($this->getPrVoteCasts() as $prVoteCast){
            foreach ($inputData as $item => $v){
                //When the given party name and it related vote cast is different from the one in the DB
                if(($prVoteCast->getPrParty()->getName() == $item)&&($prVoteCast->getFigureValue() != $v)){
                    return $prVoteCast;
                }
            }
            
        }
        
        return false;
    }
    
    public function setOnePresidentialVoteCast(array $onePrVoteCast)
    {
        foreach ($this->getPrVoteCasts() as $prVoteCast){
            foreach ($onePrVoteCast as $partyName => $voteValue){
                if($prVoteCast->getPrParty()->getName() == $partyName)
                    $prVoteCast->setFigureValue ($voteValue);
            }
        }
    }

    /**
     * Add paVoteCast
     *
     * @param \PaBundle\Entity\PaVoteCast $paVoteCast
     *
     * @return PollingStation
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
     * Constructor
     */
    public function __construct()
    {
        $this->prNotifications = new \Doctrine\Common\Collections\ArrayCollection();
        $this->prVoteCasts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->paVoteCasts = new \Doctrine\Common\Collections\ArrayCollection();
        //Initialization
        $this->setActive(false);
        $this->setPresidential(false);
        $this->setParliamentary(false);
        $this->setPresidentialEdited(false);
        $this->setParliamentaryEdited(false);
        $this->setPresidentialPinkSheet(false);
        $this->setParliamentaryPinkSheet(false);
        $this->setPresidentialPinkSheetEdited(false);
        $this->setParliamentaryPinkSheetEdited(false);
    }

    /**
     * Add prNotification
     *
     * @param \PrBundle\Entity\PrNotification $prNotification
     *
     * @return PollingStation
     */
    public function addPrNotification(\PrBundle\Entity\PrNotification $prNotification)
    {
        $this->prNotifications[] = $prNotification;

        return $this;
    }

    /**
     * Remove prNotification
     *
     * @param \PrBundle\Entity\PrNotification $prNotification
     */
    public function removePrNotification(\PrBundle\Entity\PrNotification $prNotification)
    {
        $this->prNotifications->removeElement($prNotification);
    }

    /**
     * Get prNotifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrNotifications()
    {
        return $this->prNotifications;
    }

    /**
     * Add paNotification
     *
     * @param \PaBundle\Entity\PaNotification $paNotification
     *
     * @return PollingStation
     */
    public function addPaNotification(\PaBundle\Entity\PaNotification $paNotification)
    {
        $this->paNotifications[] = $paNotification;

        return $this;
    }

    /**
     * Remove paNotification
     *
     * @param \PaBundle\Entity\PaNotification $paNotification
     */
    public function removePaNotification(\PaBundle\Entity\PaNotification $paNotification)
    {
        $this->paNotifications->removeElement($paNotification);
    }

    /**
     * Get paNotifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaNotifications()
    {
        return $this->paNotifications;
    }

    /**
     * Set prPinkSheet
     *
     * @param \PrBundle\Entity\PrPinkSheet $prPinkSheet
     *
     * @return PollingStation
     */
    public function setPrPinkSheet(\PrBundle\Entity\PrPinkSheet $prPinkSheet = null)
    {
        $this->prPinkSheet = $prPinkSheet;

        return $this;
    }

    /**
     * Get prPinkSheet
     *
     * @return \PrBundle\Entity\PrPinkSheet
     */
    public function getPrPinkSheet()
    {
        return $this->prPinkSheet;
    }

    /**
     * Set returningOfficer
     *
     * @param \VtallyBundle\Entity\ReturningOfficer $returningOfficer
     *
     * @return PollingStation
     */
    public function setReturningOfficer(\VtallyBundle\Entity\ReturningOfficer $returningOfficer = null)
    {
        $this->returningOfficer = $returningOfficer;

        return $this;
    }

    /**
     * Get returningOfficer
     *
     * @return \VtallyBundle\Entity\ReturningOfficer
     */
    public function getReturningOfficer()
    {
        return $this->returningOfficer;
    }

    /**
     * Set paPinkSheet
     *
     * @param \PaBundle\Entity\PaPinkSheet $paPinkSheet
     *
     * @return PollingStation
     */
    public function setPaPinkSheet(\PaBundle\Entity\PaPinkSheet $paPinkSheet = null)
    {
        $this->paPinkSheet = $paPinkSheet;

        return $this;
    }

    /**
     * Get paPinkSheet
     *
     * @return \PaBundle\Entity\PaPinkSheet
     */
    public function getPaPinkSheet()
    {
        return $this->paPinkSheet;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return PollingStation
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Add prEditedVoteCast
     *
     * @param \PrBundle\Entity\PrEditedVoteCast $prEditedVoteCast
     *
     * @return PollingStation
     */
    public function addPrEditedVoteCast(\PrBundle\Entity\PrEditedVoteCast $prEditedVoteCast)
    {
        $this->prEditedVoteCasts[] = $prEditedVoteCast;

        return $this;
    }

    /**
     * Remove prEditedVoteCast
     *
     * @param \PrBundle\Entity\PrEditedVoteCast $prEditedVoteCast
     */
    public function removePrEditedVoteCast(\PrBundle\Entity\PrEditedVoteCast $prEditedVoteCast)
    {
        $this->prEditedVoteCasts->removeElement($prEditedVoteCast);
    }

    /**
     * Get prEditedVoteCasts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrEditedVoteCasts()
    {
        return $this->prEditedVoteCasts;
    }

    /**
     * Add paEditedVoteCast
     *
     * @param \PaBundle\Entity\PaEditedVoteCast $paEditedVoteCast
     *
     * @return PollingStation
     */
    public function addPaEditedVoteCast(\PaBundle\Entity\PaEditedVoteCast $paEditedVoteCast)
    {
        $this->paEditedVoteCasts[] = $paEditedVoteCast;

        return $this;
    }

    /**
     * Remove paEditedVoteCast
     *
     * @param \PaBundle\Entity\PaEditedVoteCast $paEditedVoteCast
     */
    public function removePaEditedVoteCast(\PaBundle\Entity\PaEditedVoteCast $paEditedVoteCast)
    {
        $this->paEditedVoteCasts->removeElement($paEditedVoteCast);
    }

    /**
     * Get paEditedVoteCasts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaEditedVoteCasts()
    {
        return $this->paEditedVoteCasts;
    }

    /**
     * Add user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return PollingStation
     */
    public function addUser(\UserBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \UserBundle\Entity\User $user
     */
    public function removeUser(\UserBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set presidential
     *
     * @param boolean $presidential
     *
     * @return PollingStation
     */
    public function setPresidential($presidential)
    {
        $this->presidential = $presidential;

        return $this;
    }

    /**
     * Get presidential
     *
     * @return boolean
     */
    public function isPresidential()
    {
        return $this->presidential;
    }

    /**
     * Get presidential
     *
     * @return boolean
     */
    public function getPresidential()
    {
        return $this->presidential;
    }

    /**
     * Set presidentialEdited
     *
     * @param boolean $presidentialEdited
     *
     * @return PollingStation
     */
    public function setPresidentialEdited($presidentialEdited)
    {
        $this->presidentialEdited = $presidentialEdited;

        return $this;
    }

    /**
     * Get presidentialEdited
     *
     * @return boolean
     */
    public function getPresidentialEdited()
    {
        return $this->presidentialEdited;
    }

    /**
     * Set presidentialPinkSheet
     *
     * @param boolean $presidentialPinkSheet
     *
     * @return PollingStation
     */
    public function setPresidentialPinkSheet($presidentialPinkSheet)
    {
        $this->presidentialPinkSheet = $presidentialPinkSheet;

        return $this;
    }

    /**
     * Get presidentialPinkSheet
     *
     * @return boolean
     */
    public function isPresidentialPinkSheet()
    {
        return $this->presidentialPinkSheet;
    }

    /**
     * Set parliamentary
     *
     * @param boolean $parliamentary
     *
     * @return PollingStation
     */
    public function setParliamentary($parliamentary)
    {
        $this->parliamentary = $parliamentary;

        return $this;
    }

    /**
     * Get parliamentary
     *
     * @return boolean
     */
    public function isParliamentary()
    {
        return $this->parliamentary;
    }

    /**
     * Get presidentialPinkSheet
     *
     * @return boolean
     */
    public function getPresidentialPinkSheet()
    {
        return $this->presidentialPinkSheet;
    }

    /**
     * Get parliamentary
     *
     * @return boolean
     */
    public function getParliamentary()
    {
        return $this->parliamentary;
    }

    /**
     * Set parliamentaryEdited
     *
     * @param boolean $parliamentaryEdited
     *
     * @return PollingStation
     */
    public function setParliamentaryEdited($parliamentaryEdited)
    {
        $this->parliamentaryEdited = $parliamentaryEdited;

        return $this;
    }

    /**
     * Get parliamentaryEdited
     *
     * @return boolean
     */
    public function isParliamentaryEdited()
    {
        return $this->parliamentaryEdited;
    }

    /**
     * Get parliamentaryEdited
     *
     * @return boolean
     */
    public function getParliamentaryEdited()
    {
        return $this->parliamentaryEdited;
    }

    /**
     * Set parliamentaryPinkSheet
     *
     * @param boolean $parliamentaryPinkSheet
     *
     * @return PollingStation
     */
    public function setParliamentaryPinkSheet($parliamentaryPinkSheet)
    {
        $this->parliamentaryPinkSheet = $parliamentaryPinkSheet;

        return $this;
    }

    /**
     * Get parliamentaryPinkSheet
     *
     * @return boolean
     */
    public function isParliamentaryPinkSheet()
    {
        return $this->parliamentaryPinkSheet;
    }

    /**
     * Get parliamentaryPinkSheet
     *
     * @return boolean
     */
    public function getParliamentaryPinkSheet()
    {
        return $this->parliamentaryPinkSheet;
    }

    /**
     * Set parliamentaryPinkSheetEdited
     *
     * @param boolean $parliamentaryPinkSheetEdited
     *
     * @return PollingStation
     */
    public function setParliamentaryPinkSheetEdited($parliamentaryPinkSheetEdited)
    {
        $this->parliamentaryPinkSheetEdited = $parliamentaryPinkSheetEdited;

        return $this;
    }

    /**
     * Get parliamentaryPinkSheetEdited
     *
     * @return boolean
     */
    public function isParliamentaryPinkSheetEdited()
    {
        return $this->parliamentaryPinkSheetEdited;
    }

    /**
     * Get parliamentaryPinkSheetEdited
     *
     * @return boolean
     */
    public function getParliamentaryPinkSheetEdited()
    {
        return $this->parliamentaryPinkSheetEdited;
    }

    /**
     * Set presidentialPinkSheetEdited
     *
     * @param boolean $presidentialPinkSheetEdited
     *
     * @return PollingStation
     */
    public function setPresidentialPinkSheetEdited($presidentialPinkSheetEdited)
    {
        $this->presidentialPinkSheetEdited = $presidentialPinkSheetEdited;

        return $this;
    }

    /**
     * Get presidentialPinkSheetEdited
     *
     * @return boolean
     */
    public function isPresidentialPinkSheetEdited()
    {
        return $this->presidentialPinkSheetEdited;
    }

    /**
     * Get presidentialPinkSheetEdited
     *
     * @return boolean
     */
    public function getPresidentialPinkSheetEdited()
    {
        return $this->presidentialPinkSheetEdited;
    }

    /**
     * Set voterNumber
     *
     * @param integer $voterNumber
     *
     * @return PollingStation
     */
    public function setVoterNumber($voterNumber)
    {
        $this->voterNumber = $voterNumber;

        return $this;
    }

    /**
     * Get voterNumber
     *
     * @return integer
     */
    public function getVoterNumber()
    {
        return $this->voterNumber;
    }
}
