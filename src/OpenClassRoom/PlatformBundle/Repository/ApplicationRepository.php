<?php

namespace OpenClassRoom\PlatformBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ApplicationRepository extends EntityRepository
{
    public function getApplicationsWithAdvert($limit)
    {
        $qb = $this->createQueryBuilder('a');

        $qb
            ->innerJoin('a.advert', 'adv')
            ->addSelect('adv')
        ;

        $qb->setMaxResults($limit);

        return $qb
            ->getQuery()
            ->getResult()
            ;
    }

    public function isFlood($ip, $secondes)
    {
        $qb = $this->createQueryBuilder('c')
            ->select('COUNT(c)')
            ->where('c.ip = :ip')
            ->setParameter('ip', $ip)
            ->andWhere('c.date >= :date')
            ->setParameter('date', new \DateTime('-'.$secondes.'seconds'));

        return (bool) $qb
            ->getQuery()
            ->getSingleScalarResult();
    }
}