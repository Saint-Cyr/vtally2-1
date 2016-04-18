<?php

/*
 * This file is part of Components of VTALLY2 project
 * (c) YAME Group <info@yamegroup.com>
 * For the full copyrght and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace VtallyBundle\Component;

class StatisticHandler
{
    private $em;
    
    public function __construct($em) 
    {
        $this->em = $em;
    }
    
    public function getSiteNumber(array $constituencies, array $parties = null, array $indCandidates = null)
    {
        $sites = array('parties' => array(), 'IC' => array());
        
        if($parties){
            foreach ($parties as $party){  
                $depCandidates = $party->getDependentCandidates();
                foreach ($depCandidates as $candidate){ 
                    foreach ($constituencies as $const){
                        if($const->getWinner() === $candidate){ 
                            $party->increaseSiteNumber();  
                        }
                    }
                }
            }
            
            $sites['parties'] = $parties;
        }
        
        if($indCandidates) {
            $ICsite = 0;
            foreach ($indCandidates as $candidate){
                foreach ($constituencies as $const){
                    if($const->getWinner() === $candidate){
                        $ICsite++;
                    }
                }
            }
            
            $sites['IC'] = $ICsite;
        }
        
        return $sites;
    }
    
    public function presidentialMerge(array $parties1, array $parties2)
    {
        foreach ($parties1 as $party1){
            
            if(!($this->findPartyByName($party1->getName(), $parties2))){
                return;
            }
            
            $party2 = $this->findPartyByName($party1->getName(), $parties2);
            $party1->increaseVoteCast($party2->getVoteCast());
        }
        
        return $parties1;
    }
    
    public function findPartyByName($name, $parties)
    {
        foreach ( $parties as $element ) {
            if ( $name == $element->getName() ) {
                return $element;
            }
        }

        return false;
    }
}
