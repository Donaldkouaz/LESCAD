<?php

namespace lescad\platformeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use lescad\platformeBundle\Form\matiereType;
use lescad\platformeBundle\Form\categorieType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class formationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'lescad\platformeBundle\Entity\formation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lescad_platformebundle_formation';
    }


}
