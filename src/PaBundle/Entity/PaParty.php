<?php

namespace PaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * PaParty
 *
 * @ORM\Table(name="pa_party")
 * @ORM\Entity(repositoryClass="PaBundle\Repository\PaPartyRepository")
 * @ORM\HasLifecycleCallbacks
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
     * Unmapped property to handle file uploads
     */
    private $file;
    
    private $site = 0;
    
    private $order;
    
    /**
     * @var string
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;
    
    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, unique=false, nullable=true)
     */
    private $image;

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
        if (file_exists(getcwd().'/upload/images/paParty/'.$this->getImage())){
            //Remove it
            @unlink(getcwd().'/upload/images/paParty/'.$this->getImage());
            
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
        $this->getFile()->move(getcwd().'/upload/images/paParty', $this->getId().'.'.$this->getFile()->guessExtension());
        // clean up the file property as you won't need it anymore
        $this->setFile(null);
    }
    
    public function setOrder($value)
    {
        $this->order = $value;
    }
    
    public function getOrder()
    {
        return $this->order;
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
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return PrParty
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
}
