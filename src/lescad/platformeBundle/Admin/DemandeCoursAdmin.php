<?php

namespace lescad\platformeBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class DemandeCoursAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('contactee')
            ->add('message')
            ->add('nom')
            ->add('prenom')
            ->add('ville', null, array(), 'entity', array(
                'class'    => 'lescadplatformeBundle:Ville',
                'choice_label' => 'nom',
            ))
            ->add('departement', null, array(), 'entity', array(
                'class'    => 'lescadplatformeBundle:Departement',
                'choice_label' => 'nom',
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom')
            ->add('prenom')
            ->add('ville.nom')
            ->add('telephone')
            ->add('message')
            ->add('datedemande')
            ->add('contactee')
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
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('contactee')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('nom')
            ->add('prenom')
            ->add('ville.nom')    
            ->add('telephone')
            ->add('message')
            ->add('datedemande')
            ->add('contactee')
            
        ;
    }
}
