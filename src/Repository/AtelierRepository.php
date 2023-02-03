<?php

namespace App\Repository;

use App\Entity\Atelier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\ResultStatement;

/**
 * @extends ServiceEntityRepository<Atelier>
 *
 * @method Atelier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Atelier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Atelier[]    findAll()
 * @method Atelier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AtelierRepository extends ServiceEntityRepository
{
    

    public function __construct(ManagerRegistry $registry,)
    {
        parent::__construct($registry, Atelier::class);
    }

    public function save(Atelier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Atelier $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    // public function listeAtelier()
    // {
    //     $sql = 'SELECT nom_atelier, COUNT(nom_atelier)
    //         FROM `atelier` atelier JOIN lyceen etudiant JOIN atelier_lyceen atel_lyceen
    //         WHERE atelier.id = atel_lyceen.atelier_id
    //         AND etudiant.id = atel_lyceen.lyceen_id
    //         GROUP BY atelier.id'
    //     ;

    //     $stmt = $this->connection->prepare($sql);
    //     $stmt->execute();

    //     return $stmt->fetchAll();
    // }
    
    // public function listeAtelier(){
    //     // $entityManager = $this->getEntityManager();
    //     // $query = $entityManager->createQuery(
    //     //     'SELECT atelier.nomAtelier, COUNT(atelier.nomAtelier) FROM App\Entity\Lyceen etudiant
    //     //     INNER JOIN App\Entity\Atelier atelier
    //     //     WHERE etudiant.lycee = atelier.id
    //     //     GROUP BY atelier.nomAtelier'
    //     // );
    //     // return $query->getResult();

    // }





//    /**
//     * @return Atelier[] Returns an array of Atelier objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Atelier
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
