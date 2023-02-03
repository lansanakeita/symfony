<?php

namespace App\Repository;

use App\Entity\Lyceen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lyceen>
 *
 * @method Lyceen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lyceen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lyceen[]    findAll()
 * @method Lyceenent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LyceenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lyceen::class);
    }

    public function save(Lyceen $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Lyceen $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function liste(){
        $entityManager = $this->getEntityManager();
        // $query = $entityManager->createQuery(
        //     'SELECT ecole.nom, COUNT(etudiant.nom)
        //      FROM App\Entity\Lyceen etudiant
        //      INNER JOIN App\Entity\Lycee ecole
        //      WHERE etudiant.lycee = ecole
        //      GROUP BY ecole.nom'
        // );

        $query = $entityManager->createQuery(
            'SELECT l FROM App\Entity\Lyceen l
            INNER JOIN App\Entity\Lycee ecole
            WHERE l.id = ecole.id
            '
        );
    
        return $query->getResult();
    }

//    /**
//     * @return Student[] Returns an array of Student objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Student
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
