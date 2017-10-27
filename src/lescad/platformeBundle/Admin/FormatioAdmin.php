<?php

namespace lescad\platformeBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FormatioAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('description', 'text')
                ->add('nom', TextType::class)
        ->add('description', TextareaType::class)
        ->add('categorie', EntityType::class, array(
            'class'   => 'lescadplatformeBundle:categorie',
            'choice_label'    => 'nom',
            'multiple' => false,
            'expanded' => false,
        ))
        ->add('matieres', EntityType::class, array(
            'class'   => 'lescadplatformeBundle:matiere',
            'choice_label'    => 'nom',
            'multiple' => true,
            'expanded' => true,
        ))
        ->add('active', CheckboxType::class, array('required' => false));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nom')
                ->add('categorie', null, array(), 'entity', array(
                'class'    => 'lescadplatformeBundle:categorie',
                'choice_label' => 'nom',
            ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nom')
                  ->add('description')
                ->add('categorie.nom')
            ->add('active');
    }
}