<?php

namespace AppBundle\Repository;

/**
 * UserGroupRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserGroupRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAll()
    {
        return $this->createQueryBuilder('u')
            ->select('u')
            ->orderBy('u.name', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
