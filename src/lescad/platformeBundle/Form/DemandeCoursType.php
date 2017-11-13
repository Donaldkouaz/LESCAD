<?php

namespace lescad\platformeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DemandeCoursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class, array(
            'attr'   => array(
                'placeholder' => 'Votre nom',
            )
        ))
                ->add('prenom', TextType::class, array(
            'attr'   => array(
                'placeholder' => 'Votre prénom',
            )
        ))
                ->add('telephone', NumberType::class, array(
            'attr'   => array(
                'placeholder' => 'Votre contact',
            )
        ))
                ->add('departement', EntityType::class, array(
            'class'   => 'lescadplatformeBundle:Departement',
            'choice_label'    => 'nom',
            'multiple' => false,
            'expanded' => false,
        ))
                ->add('ville',EntityType::class, array(
            'class'   => 'lescadplatformeBundle:Ville',
            'choice_label'    => 'nom',
            'multiple' => false,
            'expanded' => false,
        ))
                ->add('message', TextareaType::class, array(
            'attr'   => array(
                'placeholder' => 'Veuillez décrire le service qui vous intéresse et comment désirez-vous être recontacté',
                'style' => 'min-height:150px;',
            )
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'lescad\platformeBundle\Entity\DemandeCours'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lescad_platformebundle_demandecours';
    }


}
