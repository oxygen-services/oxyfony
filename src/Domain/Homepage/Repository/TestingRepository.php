<?php

namespace App\Domain\Homepage\Repository;

use App\Domain\Hompage\Entity\Testing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Testing>
 *
 * @method Testing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Testing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Testing[]    findAll()
 * @method Testing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Testing::class);
    }

//    /**
//     * @return Testing[] Returns an array of Testing objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Testing
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
