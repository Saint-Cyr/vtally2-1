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
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('password')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt')
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('createdAt')
            ->add('image')
            ->add('address')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        
        $listMapper
            ->add('username')
            ->add('email')
            ->add('lastLogin')
            ->add('expired', null, array('editable' => true))
            ->add('expiresAt')
            ->add('firstName')
            ->add('lastName')
            ->add('address')
            
        ;
        
        if ($this->isGranted('ROLE_ENGINEER')) {
            $listMapper
                ->add('enabled', 'checkbox', array(
                    'label' => 'Account Enabled',
                    'required' => false
                    ))
                ->add('locked', 'checkbox', array(
                    'label' => 'Account Locked',
                    'required' => false
                    ))
                ->add('roles')
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
        $passwordRequired = (preg_match('/_edit$/', $this->getRequest()->get('_route'))) ? false : true;
        $formMapper
            ->add('username')
            ->add('email')
            ->add('plainPassword', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'The password fields must match.',
                    'required' => $passwordRequired,
                    'first_options'  => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password'),
                ))
            ->add('locked')
            ->add('firstName')
            ->add('lastName')
            ->add('image')
            ->add('address');
        
        if ($this->isGranted('ROLE_SUPER_ADMIN')) {
            $formMapper
                ->add('enabled', 'checkbox', array(
                    'label' => 'Account Enabled',
                    'required' => false
                    ))
                ->add('locked', 'checkbox', array(
                    'label' => 'Account Locked',
                    'required' => false
                    ))
                ->add('roles')
            ;
        }
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('username')
            ->add('usernameCanonical')
            ->add('email')
            ->add('emailCanonical')
            ->add('enabled')
            ->add('salt')
            ->add('lastLogin')
            ->add('locked')
            ->add('expired')
            ->add('expiresAt')
            ->add('confirmationToken')
            ->add('passwordRequestedAt')
            ->add('roles')
            ->add('credentialsExpired')
            ->add('credentialsExpireAt')
            ->add('id')
            ->add('firstName')
            ->add('lastName')
            ->add('createdAt')
            ->add('image')
            ->add('address')
        ;
    }
    
    public function preUpdate($user) {
        $this->userManager->updateCanonicalFields($user);
        $this->userManager->updatePassword($user);
    }
    
    public function __construct($code, $class, $baseControllerName, $manager = null) {
        parent::__construct($code, $class, $baseControllerName);
        $this->userManager = $manager;
    }
}
