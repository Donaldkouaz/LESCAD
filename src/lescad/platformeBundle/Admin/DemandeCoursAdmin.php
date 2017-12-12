<?php

namespace lescad\platformeBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class DemandeCoursAdmin extends AbstractAdmin
{
    protected $datagridValues = array(

        // reverse order (default = 'ASC')
        '_sort_order' => 'DESC',
    );
    
    public function __construct(
    $code,
    $class,
    $baseControllerName,
    TokenStorageInterface $tokenStorage
) {
    parent::__construct($code, $class, $baseControllerName);
    $this->tokenStorage = $tokenStorage;
}
    
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
    
    public function createQuery($context = 'list')
{
    $query = parent::createQuery($context);
    if (!$this->hasAccess('delete')) 
             {
       $ville = $this->tokenStorage->getToken()->getUser()->getVille()->getId();
                $query->andWhere(
        $query->expr()->eq($query->getRootAliases()[0] . '.ville', ':my_param')
    );
    $query->setParameter('my_param', $ville);
             }
    
    return $query;
}
}
