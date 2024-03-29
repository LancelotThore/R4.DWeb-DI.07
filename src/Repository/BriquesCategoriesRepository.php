<?php

namespace App\Repository;

use App\Entity\BriquesCategories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BriquesCategories>
 *
 * @method BriquesCategories|null find($id, $lockMode = null, $lockVersion = null)
 * @method BriquesCategories|null findOneBy(array $criteria, array $orderBy = null)
 * @method BriquesCategories[]    findAll()
 * @method BriquesCategories[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BriquesCategoriesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BriquesCategories::class);
    }

    //    /**
    //     * @return BriquesCategories[] Returns an array of BriquesCategories objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?BriquesCategories
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
