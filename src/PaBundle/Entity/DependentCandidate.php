<?php

namespace PaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * DependentCandidate
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="dependent_candidate")
 * @ORM\Entity(repositoryClass="PaBundle\Repository\DependentCandidateRepository")
 */
class DependentCandidate
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
     * @ORM\Column(name="image", type="string", length=255, unique=false, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;
    
    /**
     * Unmapped property to handle file uploads
     */
    private $file;
    
    /**
     * @var string
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="datetime", nullable=true)
     */
    private $dob;

    /**
     * @var int
     *
     * @ORM\Column(name="candidacyNumber", type="integer", nullable=true)
     */
    private $candidacyNumber;

    /**
     * @ORM\ManyToOne(targetEntity="PaBundle\Entity\PaParty", inversedBy="dependentCandidates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $paParty;
    
    /**
     * @ORM\OneToMany(targetEntity="PaBundle\Entity\PaVoteCast", mappedBy="dependentCandidate", cascade={"remove"})
     */
    private $paVoteCasts;
    
    /**
     * @ORM\ManyToOne(targetEntity="VtallyBundle\Entity\Constituency", inversedBy="dependentCandidates")
     * @ORM\JoinColumn(nullable=false)
     */
    private $constituency;
    
    /**
    * @ORM\PostPersist()
    * @ORM\PostUpdate()
    */
    public function lifecycleFileUpload()
    {
        $this->upload();
    }

    /**
     * @ORM\PreUpdate()
     */
    public function refreshUpdated()
    {
        $this->setUpdated(new \DateTime());
    }
    
    /**
     * @ORM\PreRemove()
     */
    public function removeUPdate()
    {
        //Check whether the file exists first
        if (file_exists(getcwd().'/upload/images/parDepCandidate/'.$this->getImage())){
            //Remove it
            @unlink(getcwd().'/upload/images/parDepCandidate/'.$this->getImage());
            
        }
        
        return;
    }
    
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }
        // move takes the target directory and target filename as params
        $this->getFile()->move(getcwd().'/upload/images/parDepCandidate', $this->getId().'.'.$this->getFile()->guessExtension());
        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }
    
    /**
    * Sets file.
    *
    * @param UploadedFile $file
    */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
    * Get file.
    *
    * @return UploadedFile
    */
    public function getFile()
    {
        return $this->file;
    }
    
    public function isIndependentCandidate()
    {
        return false;
    }
    
    public function __toString() {
        return $this->firstName;
    }
    
    public function getTotalVoteCast()
    {
        $total = 0;
        
        if(count($this->getPaVoteCasts())){
            foreach ($this->getPaVoteCasts() as $voteCast){
                $total = $total + $voteCast->getFigureValue();
            }

            return $total;
        }
        
        return $total;
            
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
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return PrDependentCandidate
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set image
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     * @param string $image
     *
     * @return PrDependentCandidate
     */
    public function setImage($image)
    {
        if($this->getFile() !== null){
            $this->image = $this->getFile()->guessExtension();
        }
        
        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->getId().'.'.$this->image;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return DependentCandidate
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
     * @return DependentCandidate
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
     * @return DependentCandidate
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
     * @return DependentCandidate
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
     * Set paParty
     *
     * @param \PaBundle\Entity\PaParty $paParty
     *
     * @return DependentCandidate
     */
    public function setPaParty(\PaBundle\Entity\PaParty $paParty)
    {
        $this->paParty = $paParty;

        return $this;
    }

    /**
     * Get paParty
     *
     * @return \PaBundle\Entity\PaParty
     */
    public function getPaParty()
    {
        return $this->paParty;
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
     * @return DependentCandidate
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
     * @return DependentCandidate
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
