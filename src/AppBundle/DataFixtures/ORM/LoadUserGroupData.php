<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 24/11/2017
 * Time: 11:18
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\UserGroup;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserGroupData extends AbstractFixture implements OrderedFixtureInterface
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
                'name' => 'Abonné',
            ],
            [
                'name' => 'Collaborateur',
            ],
            [
                'name' => 'Administrateur',
            ],
        ];
        foreach ($datas as $i => $data) {
            $userGroup = new UserGroup();
            $userGroup->setName($data['name']);
            $manager->persist($userGroup);
            $this->addReference('usergroup-'.$i, $userGroup);
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
        return 1;
    }
}