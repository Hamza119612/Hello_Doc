<?php

namespace App\Repository;

use App\Entity\Spcialite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Spcialite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Spcialite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Spcialite[]    findAll()
 * @method Spcialite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpcialiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Spcialite::class);
    }

    // /**
    //  * @return Spcialite[] Returns an array of Spcialite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Spcialite
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
