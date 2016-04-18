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
        
        if ($indCandidates) {
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
    
    public function getPresidentialMerge()
    {
        return true;
    }
}
