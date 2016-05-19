<?php

namespace VtallyBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PollingStationAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('code')
            ->add('presidential')
            ->add('active')
            ->add('district')
            ->add('constituency')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('name')
            ->add('code')
            ->add('constituency')
            ->add('active', null, array('editable' => true))
            ->add('presidential', null, array('label' => 'Pr. Sent'))
            ->add('parliamentary', null, array('label' => 'Pa. Sent'))
            ->add('presidentialPinkSheet', null, array('label' => 'Pr. Pink'))
            ->add('parliamentaryPinkSheet', null, array('label' => 'Pa. Pink'))
            ->add('presidentialEdited', null, array('label' => 'Pr. Edited'))
            ->add('parliamentaryEdited', null, array('label' => 'Pa. Edited'))
            ->add('presidentialPinkSheetEdited', null, array('label' => 'Pr. Edited pink'))
            ->add('parliamentaryPinkSheetEdited', null, array('label' => 'Pa. Edited pink'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
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
            ->add('name')
            ->add('code')
            ->add('district')
            ->add('constituency')
            ->add('active')
            ->add('presidential')
            ->add('parliamentary')
            ->add('presidentialPinkSheet')
            ->add('parliamentaryPinkSheet')
            ->add('parliamentaryEdited')
            ->add('parliamentaryPinkSheetEdited')
            ->add('users')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('name')
            ->add('code')
            ->add('users')
            ->add('district')
            ->add('prVoteCastsView')
            ->add('constituency')
        ;
    }
    
    public function getBatchActions()
    {
        // retrieve the default batch actions (currently only delete)
        $actions = parent::getBatchActions();

        if (
          $this->hasRoute('edit') && $this->isGranted('EDIT') &&
          $this->hasRoute('delete') && $this->isGranted('DELETE')
            ) {
            $actions['activate'] = array(
                'label' => 'Activate/Deactivate',
                'translation_domain' => 'SonataAdminBundle',
                'ask_confirmation' => true
            );

        }

        return $actions;
    }
}
