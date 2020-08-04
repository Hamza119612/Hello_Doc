<?php

namespace App\Repository;
Use App\Entity\User;

use App\Entity\Rendezvous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;



/**
 * @method Rendezvous|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rendezvous|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rendezvous[]    findAll()
 * @method Rendezvous[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RendezvousRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry , TokenStorageInterface $tokenStorage)
    {
        parent::__construct($registry, Rendezvous::class);
        $this->User = $tokenStorage->getToken()->getUser();
       
    }

    // /**
    //  * @return Rendezvous[] Returns an array of Rendezvous objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rendezvous
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findmyrdv()
    {
        $em =$this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM rendezvous WHERE user_id = '.$this->User->getId();
        $stmt = $em->prepare($sql);
        $stmt->execute();
       return $stmt->fetchAll();
    }
    public function findbyiddocteur($idDoc)
    {
        $em =$this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM user WHERE rendezvous.docotr_name =' .$idDoc;
        $stmt = $em->prepare($sql);
        $stmt->execute();
       return $stmt->fetchAll();
    }
    public function findrnameofmydoc()
    {
        $em =$this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM user INNER JOIN rendezvous ON rendezvous.docotr_name = user.id and rendezvous.user_id = '.$this->User->getId() ;
        $stmt = $em->prepare($sql);
        $stmt->execute();
       return $stmt->fetchAll();
    }
    public function finddoctorrdv()
    {
        $em =$this->getEntityManager()
            ->getConnection();
        $sql = 'SELECT * FROM user INNER JOIN rendezvous ON rendezvous.user_id = user.id and rendezvous.docotr_name = '.$this->User->getId();
        $stmt = $em->prepare($sql);
        $stmt->execute();
       return $stmt->fetchAll();
    }
 



  
}
