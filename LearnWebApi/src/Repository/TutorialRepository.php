<?php

namespace App\Repository;

use App\Entity\Tutorial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tutorial>
 */
class TutorialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tutorial::class);
    }

    //    /**
    //     * @return Tutorial[] Returns an array of Tutorial objects
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

    //    public function findOneBySomeField($value): ?Tutorial
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function findOneById($id): ?Tutorial
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findByHidden($hidden): array
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.hidden = :hid')
            ->setParameter('hid', $hidden)
            ->orderBy('t.id', 'DESC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByTitleOrDescription($text): array
    {
        return $this->createQueryBuilder('t')
            ->Where('t.name LIKE :tx')
            ->orWhere('t.description LIKE :tx')
            ->setParameter('tx', '%'.$text.'%')
            ->orderBy('t.id', 'DESC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByTitleOrDescriptionAndHidden($text, $hidden): array
    {
        return $this->createQueryBuilder('t')
            ->Where('t.name LIKE :tx')
            ->orWhere('t.description LIKE :tx')
            ->andWhere('t.hidden = :hid')
            ->setParameter('tx', '%'.$text.'%')
            ->setParameter('hid', $hidden)
            ->orderBy('t.id', 'DESC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAllTutorials(): array
    {
        return $this->createQueryBuilder('t')
            ->orderBy('t.id', 'DESC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByFilters(
        ?string $search = null,
        ?string $minRating = null,
        ?string $maxRating = null,
        ?string $sortBy = 'recent',
        ?string $hidden = 'available',
    ): array {
        $qb = $this->createQueryBuilder('t')
            ->leftJoin('t.scores', 's')
            ->addSelect('AVG(s.score) as avgRating')
            ->addSelect('COUNT(s.id) as ratingCount')
            ->groupBy('t.id');

        // Filtro de oculto
        if ($hidden !== 'all') {
            $qb->andWhere('t.hidden = :hidden')
            ->setParameter('hidden', false);
        }

        // Filtro de texto (nombre o descripción)
        if ($search !== null) {
            $qb->andWhere('t.name LIKE :search OR t.description LIKE :search')
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

        // Ordenación
        switch ($sortBy) {
            case 'rating':
                $qb->orderBy('avgRating', 'DESC');
                break;
            case 'popular':
                $qb->orderBy('ratingCount', 'DESC');
                break;
            case 'oldest':
                $qb->orderBy('t.modDate', 'ASC');
                break;
            default: // 'recent'
                $qb->orderBy('t.modDate', 'DESC');
        }

        return $qb->getQuery()->getResult();
    }
}
