<?php

namespace PaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaEditedVoteCast
 *
 * @ORM\Table(name="pa_edited_vote_cast")
 * @ORM\Entity(repositoryClass="PaBundle\Repository\PaEditedVoteCastRepository")
 */
class PaEditedVoteCast
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
     * @var int
     *
     * @ORM\Column(name="figureValue", type="integer")
     */
    private $figureValue;

    /**
     * @var string
     *
     * @ORM\Column(name="wordValue", type="string", length=255, nullable=true)
     */
    private $wordValue;

    /**
     * @ORM\ManyToOne(targetEntity="VtallyBundle\Entity\PollingStation", inversedBy="paEditedVoteCasts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pollingStation;
    
    /**
     * @ORM\ManyToOne(targetEntity="PaBundle\Entity\DependentCandidate", inversedBy="paVoteCasts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $dependentCandidate;
    
    /**
     * @ORM\ManyToOne(targetEntity="PaBundle\Entity\IndependentCandidate", inversedBy="paVoteCasts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $independentCandidate;
    
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
     * Set figureValue
     *
     * @param integer $figureValue
     *
     * @return PaEditedVoteCast
     */
    public function setFigureValue($figureValue)
    {
        $this->figureValue = $figureValue;

        return $this;
    }

    /**
     * Get figureValue
     *
     * @return int
     */
    public function getFigureValue()
    {
        return $this->figureValue;
    }

    /**
     * Set wordValue
     *
     * @param string $wordValue
     *
     * @return PaEditedVoteCast
     */
    public function setWordValue($wordValue)
    {
        $this->wordValue = $wordValue;

        return $this;
    }

    /**
     * Get wordValue
     *
     * @return string
     */
    public function getWordValue()
    {
        return $this->wordValue;
    }

    /**
     * Set pollingStation
     *
     * @param \VtallyBundle\Entity\PollingStation $pollingStation
     *
     * @return PaEditedVoteCast
     */
    public function setPollingStation(\VtallyBundle\Entity\PollingStation $pollingStation)
    {
        $this->pollingStation = $pollingStation;

        return $this;
    }

    /**
     * Get pollingStation
     *
     * @return \VtallyBundle\Entity\PollingStation
     */
    public function getPollingStation()
    {
        return $this->pollingStation;
    }

    /**
     * Set dependentCandidate
     *
     * @param \PaBundle\Entity\DependentCandidate $dependentCandidate
     *
     * @return PaEditedVoteCast
     */
    public function setDependentCandidate(\PaBundle\Entity\DependentCandidate $dependentCandidate = null)
    {
        $this->dependentCandidate = $dependentCandidate;

        return $this;
    }

    /**
     * Get dependentCandidate
     *
     * @return \PaBundle\Entity\DependentCandidate
     */
    public function getDependentCandidate()
    {
        return $this->dependentCandidate;
    }

    /**
     * Set independentCandidate
     *
     * @param \PaBundle\Entity\IndependentCandidate $independentCandidate
     *
     * @return PaEditedVoteCast
     */
    public function setIndependentCandidate(\PaBundle\Entity\IndependentCandidate $independentCandidate = null)
    {
        $this->independentCandidate = $independentCandidate;

        return $this;
    }

    /**
     * Get independentCandidate
     *
     * @return \PaBundle\Entity\IndependentCandidate
     */
    public function getIndependentCandidate()
    {
        return $this->independentCandidate;
    }
}
