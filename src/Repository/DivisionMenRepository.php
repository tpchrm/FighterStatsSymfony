<?php

namespace App\Repository;

use App\Entity\DivisionMen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DivisionMen|null find($id, $lockMode = null, $lockVersion = null)
 * @method DivisionMen|null findOneBy(array $criteria, array $orderBy = null)
 * @method DivisionMen[]    findAll()
 * @method DivisionMen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DivisionMenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DivisionMen::class);
    }

    // /**
    //  * @return DivisionMen[] Returns an array of DivisionMen objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DivisionMen
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
