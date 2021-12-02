<?php

namespace App\Repository;

use App\Entity\FightMen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FightMen|null find($id, $lockMode = null, $lockVersion = null)
 * @method FightMen|null findOneBy(array $criteria, array $orderBy = null)
 * @method FightMen[]    findAll()
 * @method FightMen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FightMenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FightMen::class);
    }

    // /**
    //  * @return FightMen[] Returns an array of FightMen objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FightMen
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
