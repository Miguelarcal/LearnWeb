<?php

namespace App\Repository;

use App\Entity\Course;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Course>
 */
class CourseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Course::class);
    }

    //    /**
    //     * @return Course[] Returns an array of Course objects
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

    //    public function findOneBySomeField($value): ?Course
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findOneById($id): ?Course
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findAllCourses(): array
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.id', 'DESC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByHidden($hidden): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.hidden = :hid')
            ->setParameter('hid', $hidden)
            ->orderBy('c.id', 'DESC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByFilters(
        ?string $search = null,
        ?string $minRating = null,
        ?string $maxRating = null,
        ?string $difficulty = 'any',
        ?string $sortBy = 'recent',
        ?string $hidden = 'available',
    ): array {
        $qb = $this->createQueryBuilder('c')
            ->leftJoin('c.scores', 's')
            ->addSelect('AVG(s.score) as avgRating')
            ->addSelect('COUNT(s.id) as ratingCount')
            ->groupBy('c.id');

        // Filtro de oculto
        if ($hidden !== 'all') {
            $qb->andWhere('c.hidden = :hidden')
            ->setParameter('hidden', false);
        }

        // Filtro de texto (nombre o descripción)
        if ($search !== null) {
            $qb->andWhere('c.name LIKE :search OR c.description LIKE :search')
            ->setParameter('search', '%'.$search.'%');
        }

        // Filtros de puntuación
        if ($minRating !== null) {
            $qb->andHaving('AVG(s.score) >= :minRating')
            ->setParameter('minRating', $minRating);
        }

        if ($maxRating !== null) {
            $qb->andHaving('AVG(s.score) <= :maxRating')
            ->setParameter('maxRating', $maxRating);
        }

        // Filtro de dificultad
        if ($difficulty !== 'any') {
            $qb->andWhere('c.difficulty = :difficulty')
            ->setParameter('difficulty', $difficulty);
        }

        // Ordenación
        switch ($sortBy) {
            case 'rating':
                $qb->orderBy('avgRating', 'DESC');
                break;
            case 'popular':
                $qb->orderBy('ratingCount', 'DESC');
                break;
            case 'oldest':
                $qb->orderBy('c.modDate', 'ASC');
                break;
            default: // 'recent'
                $qb->orderBy('c.modDate', 'DESC');
        }

        return $qb->getQuery()->getResult();
    }
}
