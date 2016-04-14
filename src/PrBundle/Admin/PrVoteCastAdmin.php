<?php

namespace PrBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PrVoteCastAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('figureValue')
            ->add('wordValue')
            ->add('prDependentCandidate')
            ->add('edited')
            ->add('pollingStation')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('figureValue')
            ->add('wordValue')
            ->add('pollingStation')
            ->add('prDependentCandidate')
            ->add('edited')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('figureValue')
            ->add('wordValue')
            ->add('pollingStation', 'entity', array('class' => 'VtallyBundle\Entity\PollingStation',
                                                    
                                                    'query_builder' => function(\VtallyBundle\Repository\PollingStationRepository $r){return $r->getLimitedList(100);}))
            ->add('prDependentCandidate')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('figureValue')
            ->add('wordValue')
            ->add('pollingStation')
            ->add('prDependentCandidate')
            ->add('edited')
        ;
    }
}
