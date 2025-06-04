<?php

namespace App\Repository;

use App\Entity\TutorialScore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TutorialScore>
 */
class TutorialScoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TutorialScore::class);
    }

    //    /**
    //     * @return TutorialScore[] Returns an array of TutorialScore objects
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

    //    public function findOneBySomeField($value): ?TutorialScore
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }


    public function findOneByUserAndTutorial($tutorial, $user): ?TutorialScore
    {
        return $this->createQueryBuilder('ts')
            ->where('ts.tutorial = :tutorial')
            ->andWhere('ts.user = :user')
            ->setParameter('tutorial', $tutorial)
            ->setParameter('user', $user)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOneByUserAndTutorialAndScore($user, $tutorial, $score): ?TutorialScore
    {
        return $this->createQueryBuilder('ts')
            ->where('ts.tutorial = :tutorial')
            ->andWhere('ts.user = :user')
            ->andWhere('ts.score = :score')
            ->setParameter('tutorial', $tutorial)
            ->setParameter('user', $user)
            ->setParameter('score', $score)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findByUser($user): ?TutorialScore
    {
        return $this->createQueryBuilder('ts')
            ->andWhere('ts.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByTutorial($tutorial): array
    {
        return $this->createQueryBuilder('ts')
            ->andWhere('ts.tutorial = :tutorial')
            ->setParameter('tutorial', $tutorial)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAverageScoreByTutorial($tutorial): array
    {
        return $this->createQueryBuilder('ts')
            ->select('AVG(ts.score) as average_score', 'COUNT(ts.id) as score_count')
            ->andWhere('ts.tutorial = :tutorial')
            ->setParameter('tutorial', $tutorial)
            ->getQuery()
            ->getSingleResult()
        ;
    }
}
