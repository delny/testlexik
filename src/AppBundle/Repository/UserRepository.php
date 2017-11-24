<?php

namespace AppBundle\Repository;

use AppBundle\Entity\UserGroup;
/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return array
     */
    public function findAll()
    {
        return $this->createQueryBuilder('u')
            ->select('u')
            ->orderBy('u.group', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param String $search
     * @return array
     */
    public function lookFor(String $search)//available only PHP 7, in earlier remove type String
    {
        dump($search);
        return $this->createQueryBuilder('u')
            ->select('u')
            ->orWhere('u.firstName LIKE :search')
            ->orWhere('u.lastName LIKE :search')
            ->setParameter(':search','%'.$search.'%')
            ->getQuery()
            ->getResult();
    }
}
