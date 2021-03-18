<?php

namespace App\Repository;

use App\Entity\ProduitFourniture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProduitFourniture|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitFourniture|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitFourniture[]    findAll()
 * @method ProduitFourniture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitFournitureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitFourniture::class);
    }

    // /**
    //  * @return ProduitFourniture[] Returns an array of ProduitFourniture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProduitFourniture
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
