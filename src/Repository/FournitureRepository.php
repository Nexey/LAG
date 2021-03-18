<?php

namespace App\Repository;

use App\Entity\Fourniture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fourniture|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fourniture|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fourniture[]    findAll()
 * @method Fourniture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FournitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fourniture::class);
    }

    // /**
    //  * @return Fourniture[] Returns an array of Fourniture objects
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
    public function findOneBySomeField($value): ?Fourniture
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
