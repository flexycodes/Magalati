<?php

namespace App\Repository;

use App\Entity\Menu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Menu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Menu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Menu[]    findAll()
 * @method Menu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menu::class);
    }

    // /**
    //  * @return Menu[] Returns an array of Menu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Menu
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.status = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllGreaterThanStatus($status, $parent_id=0): array
    {
        //->andWhere('m.parent_id = :parent_id')

        $qb = $this
            ->createQueryBuilder('m')
            ->select('m.id, m.menu_name as m_name ,m.parent_id , m.link, m.status, m.routename, m.sort_order as m_sort')
            ->where('m.status = :status')
            ->andWhere('m.parent_id = :parent_id')
            ->setParameters(
                array(
                    'status'=> $status, 
                    'parent_id'=> $parent_id, 
                )
            )
            ->orderBy('m.id', 'ASC')
            ->getQuery()
        ;
        $menus = $qb->execute();

        return $menus;
    }
    
}
