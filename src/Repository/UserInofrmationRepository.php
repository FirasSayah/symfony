<?php

namespace App\Repository;

use App\Entity\UserInofrmation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserInofrmation|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserInofrmation|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserInofrmation[]    findAll()
 * @method UserInofrmation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserInofrmationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserInofrmation::class);
    }

    // /**
    //  * @return UserInofrmation[] Returns an array of UserInofrmation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserInofrmation
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
