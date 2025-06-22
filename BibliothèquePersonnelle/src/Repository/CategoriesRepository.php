<?php

namespace App\Repository;

use App\Entity\Categories;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use InvalidArgumentException;

/**
 * @extends ServiceEntityRepository<Categories>
 */
class CategoriesRepository extends ServiceEntityRepository
{


    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categories::class);
    }

    public function add(Categories $entity, bool $flush = true): void
    {
        if(!empty($entity)){
            try {
                $this->getEntityManager()->persist($entity);

                $this->getEntityManager()->flush();

            } catch (InvalidArgumentException $e){
                $e->getMessage("AAAAAAAAAAAAAAAH");
            }
        }

    }

    public function delete(int $id, bool $flush = true): void
    {
        $categoryToRemove = $this->getEntityManager()->getRepository(Categories::class)->find($id);
        if(!empty($categoryToRemove)){
            try {
                $this->getEntityManager()->remove($categoryToRemove);
                if ($flush) {
                    $this->getEntityManager()->flush();
                }
            } catch (InvalidArgumentException $e){
                $e->getMessage("yapabon");
            }

        }

    }





    //    /**
    //     * @return Categories[] Returns an array of Categories objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Categories
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
