<?php

namespace TFE\LibrairieBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * AuteurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AuteurRepository extends EntityRepository
{
    public function countAll()
    {
        return $this->createQueryBuilder('a')
            ->select('COUNT(a)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function getListe($page=1, $maxparpage=10)
    {
        $qb = $this->createQueryBuilder('a')
            ->orderBy('a.nomAuteur')
            ->setFirstResult(($page-1) * $maxparpage)
            ->setMaxResults($maxparpage);

        return new Paginator($qb);
    }
}