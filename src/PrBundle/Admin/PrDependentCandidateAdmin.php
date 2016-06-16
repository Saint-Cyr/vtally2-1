<?php

namespace PrBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PrDependentCandidateAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('dob')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('image', null, array('template' => 'VtallyBundle:Default:list.html.twig'))
            //->add('image')
            ->add('firstName')
            ->add('lastName')
            ->add('dob')
            ->add('candidacyNumber')
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
            ->with('Personal details', array('class' => 'col-md-6'))   
                ->add('firstName')
                ->add('lastName')
                ->add('prParty')
                ->add('dob', 'date')
                ->add('file', 'file')
                //->add('dob', 'sonata_type_date_picker', array('label'=>'Date de prise de fonction','dp_language'=>'fr','format'=>'dd/MM/yyyy'))
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('dob')
        ;
    }
    
    public function prePersist($image)
    {
        $this->manageFileUpload($image);
    }

    public function preUpdate($image)
    {
        $this->manageFileUpload($image);
    }

    private function manageFileUpload($image)
    {
        if ($image->getFile()) {
            $image->refreshUpdated();
        }
    }
}
