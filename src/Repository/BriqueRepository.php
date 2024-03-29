<?php

namespace App\Repository;

use App\Entity\Brique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Brique>
 *
 * @method Brique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Brique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Brique[]    findAll()
 * @method Brique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Brique::class);
    }

    public function findAllCategories(): array
    {
        return $this->createQueryBuilder('l')
            ->select('DISTINCT l.category_id')
            ->getQuery()
            ->getResult();
    }

    public function findByCategories(string $category_id): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.category_id = :category_id')
            ->setParameter('category_id', $category_id)
            ->getQuery()
            ->getResult();
    }

    //    /**
    //     * @return Brique[] Returns an array of Brique objects
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

    //    public function findOneBySomeField($value): ?Brique
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
