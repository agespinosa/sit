<?php

namespace App\Repository;

use App\Entity\Agente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Agente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Agente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Agente[]    findAll()
 * @method Agente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Agente::class);
    }

    // /**
    //  * @return Agente[] Returns an array of Agente objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Agente
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
