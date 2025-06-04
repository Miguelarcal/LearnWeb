<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    //    /**
    //     * @return User[] Returns an array of User objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?User
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function validateUser($nickname): ?User
    {
        return $this->createQueryBuilder('u')
            ->where('u.nickname = :nickname')
            ->setParameter('nickname', $nickname)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
    public function findOneUserByNicknameAndPassword($nickname, $passwd): ?User 
    {
        return $this->createQueryBuilder('u')
            ->where('u.nickname = :nickname')
            ->andWhere('u.passwd = :passwd')
            ->setParameter('nickname', $nickname)
            ->setParameter('passwd', $passwd)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
    public function findOneUserByNicknameAndEmail($nickname, $email): ?User 
    {
        return $this->createQueryBuilder('u')
            ->where('u.nickname = :nickname')
            ->orWhere('u.email = :email')
            ->setParameter('nickname', $nickname)
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function findOneById($id): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
