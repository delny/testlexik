<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 24/11/2017
 * Time: 11:20
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $datas = [
            [
                'firstName' => 'Thierry',
                'lastName' => 'Richard',
                'email' => 'trichard@free.fr',
                'birthday' => \DateTime::createFromFormat('Y-m-d H:i:s', '1989-12-04 00:00:00'),
                'group' => $this->getReference('usergroup-0')
            ],
            [
                'firstName' => 'Marc',
                'lastName' => 'Richard',
                'email' => 'mrichard@free.fr',
                'birthday' => \DateTime::createFromFormat('Y-m-d H:i:s', '1985-12-04 00:00:00'),
                'group' => $this->getReference('usergroup-0')
            ],
            [
                'firstName' => 'Alain',
                'lastName' => 'Verse',
                'email' => 'alainverse@gmail.com',
                'birthday' => \DateTime::createFromFormat('Y-m-d H:i:s', '1992-06-25 00:00:00'),
                'group' => $this->getReference('usergroup-1')
            ],
            [
                'firstName' => 'Vincent',
                'lastName' => 'Time',
                'email' => 'vincent.time@gmail.com',
                'birthday' => \DateTime::createFromFormat('Y-m-d H:i:s', '1982-10-12 00:00:00'),
                'group' => $this->getReference('usergroup-2')
            ],
        ];
        foreach ($datas as $i => $data) {
            $user = new User();
            $user->setFirstName($data['firstName']);
            $user->setLastName($data['lastName']);
            $user->setEmail($data['email']);
            $user->setBirthday($data['birthday']);
            $user->setGroup($data['group']);
            $manager->persist($user);
        }
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 10;
    }
}