<?php

namespace App\Repository;

use App\Entity\CourseScore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CourseScore>
 */
class CourseScoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseScore::class);
    }

    //    /**
    //     * @return CourseScore[] Returns an array of CourseScore objects
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

    //    public function findOneBySomeField($value): ?CourseScore
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findOneByUserAndCourse($course, $user): ?CourseScore
    {
        return $this->createQueryBuilder('cs')
            ->where('cs.course = :course')
            ->andWhere('cs.user = :user')
            ->setParameter('course', $course)
            ->setParameter('user', $user)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOneByUserAndCourseAndScore($user, $course, $score): ?CourseScore
    {
        return $this->createQueryBuilder('cs')
            ->where('cs.course = :course')
            ->andWhere('cs.user = :user')
            ->andWhere('cs.score = :score')
            ->setParameter('course', $course)
            ->setParameter('user', $user)
            ->setParameter('score', $score)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findByUser($user): ?CourseScore
    {
        return $this->createQueryBuilder('cs')
            ->andWhere('cs.user = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByCourse($course): array
    {
        return $this->createQueryBuilder('cs')
            ->andWhere('cs.course = :course')
            ->setParameter('course', $course)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAverageScoreByCourse($course): array
    {
        return $this->createQueryBuilder('cs')
            ->select('AVG(cs.score) as average_score', 'COUNT(cs.id) as score_count')
            ->andWhere('cs.course = :course')
            ->setParameter('course', $course)
            ->getQuery()
            ->getSingleResult()
        ;
    }
}
