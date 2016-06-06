<?php

namespace UserBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use FOS\UserBundle\Model\UserManagerInterface;

class UserAdmin extends Admin
{
    private $userManager;
    
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('username')
            ->add('email')
            ->add('enabled')
            ->add('locked')
            ->add('firstName')
            ->add('address')
            ->add('pollingStation')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $option = false;
        if($this->isGranted('EDIT')){
            $option = true;
        }
        
        $listMapper
            ->add('id')
            ->add('username')
            ->add('email')
            ->add('firstName')
            ->add('lastName')
            ->add('phoneNumber')
            ->add('userToken')
            ->add('isActive')
        ;
        
        if ($this->isGranted('EDIT')) {
            $listMapper
                ->add('enabled', null, array('editable' => $option))
                ->add('locked', null, array('editable' => $option))
                ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
            ;
        }
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        
        $typeContext = array('Verifier1' => 'verifier1',
                             'Verifier2' => 'verifier2',
                             'Administrator' => 'administrator',
                             'Manager' => 'manager');
        
        if($this->isGranted('ROLE_SUPER_ADMIN')){
            $typeContext['Super-Admin'] = 'super-admin';
        }
        
        $passwordRequired = (preg_match('/_edit$/', $this->getRequest()->get('_route'))) ? false : true;
        $formMapper
            ->with('Connexion Information', array('class' => 'col-md-4'))
                ->add('username')
                ->add('email')
                ->add('plainPassword', 'repeated', array(
                        'type' => 'password',
                        'invalid_message' => 'The password fields must match.',
                        'required' => $passwordRequired,
                        'first_options'  => array('label' => 'Password'),
                        'second_options' => array('label' => 'Repeat Password'),
                    ))
            ->end()
                
        ->with('Personal information', array('class' => 'col-md-4'))
            
            ->add('firstName')
            ->add('lastName')
            ->add('phoneNumber')
            ->add('address');
        
                
        
        
        if($this->isGranted('ROLE_ADMIN')){
            
            $formMapper
                 ->add('pollingStation', 'sonata_type_model_autocomplete', 
                  array('required' => false,
                        'property' => 'name',
                        'to_string_callback' => function($entity, $property){return $entity->getName();}))
                ->end();
            
        }
        
        if ($this->isGranted('EDIT')) {
            $formMapper->end()
            ->with('Security', array('class' => 'col-md-4'))
                ->add('type', 'choice', array('choices' => $typeContext,
                                              'expanded' => true))
            ->end();
        }
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('pollingStation')
            ->add('email')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
            ->add('roles')
            ->add('firstName')
            ->add('lastName')
        ;
    }
    
    public function preUpdate($user) {
        $this->userManager->updateCanonicalFields($user);
        $this->userManager->updatePassword($user);
    }
    
    public function preValidate($user) {
        switch ($user->getType()){
        case 'super-admin':
            $user->setRoles(array('ROLE_SUPER_ADMIN'));
        break;
        case 'administrator':
            $user->setRoles(array('ROLE_ADMIN'));
        break;
        case 'manager':
            $user->setRoles(array('ROLE_MANAGER'));
        break;
        case 'verifier1':
            $user->setRoles(array('ROLE_VERIFIER'));
            $user->setVerifierType(true);
        break;
        case 'verifier2':
            $user->setRoles(array('ROLE_VERIFIER'));
            $user->setVerifierType(false);
        break;
        case 'third-party':
            $user->setRoles(array('ROLE_THIRD_PARTY'));
        break;
    
        }
    }
    
    public function __construct($code, $class, $baseControllerName, $manager = null) {
        parent::__construct($code, $class, $baseControllerName);
        $this->userManager = $manager;
    }
}
