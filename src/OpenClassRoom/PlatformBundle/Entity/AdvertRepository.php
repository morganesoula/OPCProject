<?php

// src/OpenClassRoom/PlatformBundle/Entity/AdvertRepository.php

namespace OpenClassRoom\PlatformBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

class AdvertRepository extends EntityRepository
{
    public function myFindAll()
    {
        return $this
            ->createQueryBuilder('a')
            ->getQuery()
            ->getResult();
    }

    public function whereCurrentYear(QueryBuilder $qb)
    {
        $qb
            ->andWhere('a.date BETWEEN :start AND :end')
            ->setParameter('start', new \DateTime(date('Y').'-01-01'))
            ->setParameter('end', new \DateTime(date('Y').'-12-31'));
    }

    public function getAdvertWithApplications()
    {
        $qb = $this
            ->createQueryBulider('a')
            ->leftJoin('a.applications', 'app')
            ->addSelect('app');

        return $qb
            ->getQuery()
            ->getResult();
    }

    public function getAdvertWithCategories(array $categoryNames)
    {
        $qb = $this->createQueryBuilder('a');

        $qb->innerJoin('a.categories', 'c')
            ->addSelect('c');

        $qb->where($qb->expr()->in('c.name', $categoryNames));


        return $qb
            ->getQuery()
            ->getResult();
    }

}
