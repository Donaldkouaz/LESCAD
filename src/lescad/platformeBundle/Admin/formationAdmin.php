<?php

namespace lescad\platformeBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class formationAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('description')
            ->add('prerequis')
            ->add('cout')
            ->add('active')
            ->add('avant')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nom')
            ->add('description')
            ->add('cout')
            ->add('active')
            ->add('avant')
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
        ->tab('Formation')
          ->with('Formation', array('class' => 'col-md-9'))
            ->add('nom')
            ->add('description')
            ->add('prerequis')
            ->add('cout')
          ->end()
          ->with('Configuration', array('class' => 'col-md-3'))
            ->add('active')
            ->add('avant')
            ->add('categorie', EntityType::class, array(
                    'class' => 'lescadplatformeBundle:categorie',
                    'choice_label' => 'nom',
                    'multiple' => false,
                    'expanded' => false,
                ))
                ->add('matieres', EntityType::class, array(
                    'class' => 'lescadplatformeBundle:matiere',
                    'choice_label' => 'nom',
                    'multiple' => true,
                    'expanded' => false,
                ))
          ->end()
        ->end()
        ->tab('Images')
          ->with('Prévisualisation', array('class' => 'col-md-6'))
                ->add('fichierImage', VichImageType::class, [
            'required' => false,
            'allow_delete' => true,
            'download_label' => '...',
            'download_uri' => true,
            'image_uri' => true,
        ])
          ->end()
          ->with('Bannière', array('class' => 'col-md-6'))
                ->add('fichierBanniere', VichImageType::class, [
            'required' => false,
            'allow_delete' => true,
            'download_label' => '...',
            'download_uri' => true,
            'image_uri' => true,
        ])
          ->end()
        ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('nom')
            ->add('description')
            ->add('prerequis')
            ->add('cout')
            ->add('active')
            ->add('avant')
            ->add('datecreation')
            ->add('datemodification')
        ;
    }
}
