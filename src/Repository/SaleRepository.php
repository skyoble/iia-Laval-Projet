<?php

namespace App\Repository;

use App\Entity\Sale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sale|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sale|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sale[]    findAll()
 * @method Sale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SaleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sale::class);
    }


    // /**
    //  * @return sales rapport group by region with sales sum
    //  */
    public function getRapport()
    {
        return $this->createQueryBuilder("s")
              ->select("region.id, region.Name, sum(s.montant)")
              ->join("s.id_region", "region")
              ->groupBy("region.Name")
              ->getQuery()
              ->getResult();
    }

    // /**
    //  * @return sales by region with seller name
    //  */
    public function getSaleByIdRegion(int $id)
    {
        return $this->createQueryBuilder("s")
              ->select("seller.code, s.montant, s.sale_day")
              ->join("s.id_region", "region")
              ->join("s.id_Seller", "seller")
              ->where('region.id = :id')
              ->setParameter('id', $id)
              ->orderBy('s.sale_day', 'desc')
              ->getQuery()
              ->getResult();
    }    

    // /**
    //  * @return Sale[] Returns an array of Sale objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sale
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
