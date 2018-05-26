<?php

namespace App\Repository;

use App\Entity\DjSetEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DjSetEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method DjSetEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method DjSetEntity[]    findAll()
 * @method DjSetEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DjSetEntityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DjSetEntity::class);
    }

//    /**
//     * @return DjSetEntity[] Returns an array of DjSetEntity objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DjSetEntity
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
