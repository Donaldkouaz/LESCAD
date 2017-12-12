<?php

declare(strict_types = 1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Admin\Entity;

use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UserAdmin extends BaseUserAdmin {

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper): void {
        parent::configureFormFields($formMapper);

        $formMapper
                ->tab('User')
                    ->with('Profil')
                        ->add('ville', EntityType::class, array(
                            'class' => 'lescadplatformeBundle:ville',
                            'choice_label' => 'nom',
                            'multiple' => false,
                            'expanded' => false,
                        ))
                    ->end()
                ->end()
        ;
    }

}
