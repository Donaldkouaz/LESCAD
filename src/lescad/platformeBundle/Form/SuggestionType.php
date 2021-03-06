<?php

namespace lescad\platformeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class SuggestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class)
                ->add('prenom', TextType::class)
                ->add('telephone', NumberType::class)
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
                ->add('message', TextareaType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'lescad\platformeBundle\Entity\Suggestion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lescad_platformebundle_suggestion';
    }


}
