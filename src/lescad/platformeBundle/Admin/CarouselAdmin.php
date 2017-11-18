<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace lescad\platformeBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class CarouselAdmin extends AbstractAdmin {

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper->add('titre', 'text')
                ->add('description', 'textarea')
                ->add('fichier', VichImageType::class, [
                    'required' => false,
                    'allow_delete' => true,
                    'download_label' => '...',
                    'download_uri' => true,
                    'image_uri' => true,
                ])
                ->add('active', CheckboxType::class, array('required' => false));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('titre');
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper->addIdentifier('titre')
                ->add('description')
                ->add('active');
    }

}
