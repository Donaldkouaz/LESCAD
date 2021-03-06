<?php

namespace lescad\platformeBundle\Repository;

/**
 * VilleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VilleRepository extends \Doctrine\ORM\EntityRepository
{
    public function getOrderedQueryBuilder()
  {
    return $this
      ->createQueryBuilder('v')
      ->orderBy('v.nom', 'ASC')
    ;
  }
  
   public function FindAllByDepartement($dep) {
        $qb = $this
                ->createQueryBuilder('v')
                ->leftJoin('v.departement', 'd')
                ->addSelect('d')
                ->where('d.id = :dep')
                ->setParameter('dep', $dep)
                ->orderBy('v.nom', 'ASC')
        ;

        return $qb
        ;
    }
}
