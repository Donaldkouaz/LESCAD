<?php
namespace Application\UserBundle\Admin;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserAdmin
 *
 * @author Donald
 */



use Sonata\UserBundle\Admin\Entity\UserAdmin as BaseUserAdmin;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends BaseUserAdmin {

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper) {
        parent::configureFormFields($formMapper);

        $formMapper
                ->tab('User')
                    ->with('general')
                        ->add('ville', null, array(), 'entity', array(
                            'class' => 'lescadplatformeBundle:Ville',
                            'choice_label' => 'nom',
                        ))
                    ->end()
                ->end()
        ;
    }

}
