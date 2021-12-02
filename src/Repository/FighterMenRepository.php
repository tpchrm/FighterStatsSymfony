<?php

namespace App\Repository;

use App\Entity\FighterMen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FighterMen|null find($id, $lockMode = null, $lockVersion = null)
 * @method FighterMen|null findOneBy(array $criteria, array $orderBy = null)
 * @method FighterMen[]    findAll()
 * @method FighterMen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FighterMenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FighterMen::class);
    }

    // /**
    //  * @return FighterMen[] Returns an array of FighterMen objects
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
    public function findOneBySomeField($value): ?FighterMen
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
