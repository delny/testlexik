<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 24/11/2017
 * Time: 12:59
 */

namespace AppBundle\Manager;


use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
    private $manager;

    /**
     * UserManager constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }

    /**
     * @return User
     */
    public function create()
    {
        return new User();
    }

    /**
     * @param User $user
     */
    public function save(User $user)
    {
        if($user->getId() === null){
            $this->manager->persist($user);
        }
        $this->manager->flush();
    }

    /**
     * @param User $user
     */
    public function delete(User $user)
    {
        $this->manager->remove($user);
        $this->manager->flush();
    }


    /**
     * @param $id
     * @return User|null|object
     */
    public function findById($id)
    {
        return $this->manager->getRepository(User::class)->find($id);
    }

    /**
     * @return User[]|array
     */
    public function getAllUsers()
    {
        return $this->manager->getRepository(User::class)->findAll();
    }

    /**
     * @param String $search
     * @return array
     */
    public function lookFor(String $search) //available only PHP 7, in earlier remove type String
    {
        return $this->manager->getRepository(User::class)->lookFor($search);
    }
}
