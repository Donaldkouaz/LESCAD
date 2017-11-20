<?php

namespace lescad\userBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class userAdmin extends AbstractAdmin {

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('username')
                ->add('usernameCanonical')
                ->add('email')
                ->add('emailCanonical')
                ->add('enabled')
                ->add('salt')
                ->add('password')
                ->add('lastLogin')
                ->add('confirmationToken')
                ->add('passwordRequestedAt')
                ->add('roles')
                ->add('id')
                ->add('nom')
                ->add('prenom')
                ->add('birthday')
                ->add('profession')
                ->add('telephone')
                ->add('departement')
                ->add('commune')
                ->add('quartier')
                ->add('avatar')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('username')
                ->add('usernameCanonical')
                ->add('email')
                ->add('emailCanonical')
                ->add('enabled')
                ->add('salt')
                ->add('password')
                ->add('lastLogin')
                ->add('confirmationToken')
                ->add('passwordRequestedAt')
                ->add('roles')
                ->add('id')
                ->add('nom')
                ->add('prenom')
                ->add('birthday')
                ->add('profession')
                ->add('telephone')
                ->add('departement')
                ->add('commune')
                ->add('quartier')
                ->add('avatar')
                ->add('type.nom')
                ->add('_action', null, array(
                    'actions' => array(
                        'show' => array(),
                    ),
                ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('username')
                ->add('usernameCanonical')
                ->add('email')
                ->add('emailCanonical')
                ->add('enabled')
                ->add('salt')
                ->add('password')
                ->add('lastLogin')
                ->add('confirmationToken')
                ->add('passwordRequestedAt')
                ->add('id')
                ->add('nom')
                ->add('prenom')
                ->add('birthday')
                ->add('profession')
                ->add('telephone')
                ->add('departement')
                ->add('commune')
                ->add('quartier')
                ->add('avatar')
                ->add('type', EntityType::class, array(
                    'class' => 'lescadplatformeBundle:Role',
                    'choice_label' => 'nom',
                    'multiple' => true,
                    'expanded' => false,
                ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper) {
        $showMapper
                ->add('username')
                ->add('usernameCanonical')
                ->add('email')
                ->add('emailCanonical')
                ->add('enabled')
                ->add('salt')
                ->add('password')
                ->add('lastLogin')
                ->add('confirmationToken')
                ->add('passwordRequestedAt')
                ->add('roles')
                ->add('id')
                ->add('nom')
                ->add('prenom')
                ->add('birthday')
                ->add('profession')
                ->add('telephone')
                ->add('departement')
                ->add('commune')
                ->add('quartier')
                ->add('avatar')
                ->add('type.nom')
        ;
    }

}
