<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 24/11/2017
 * Time: 10:42
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Entity\UserGroup;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="home")
     */
    public function indexAction (Request $request)
    {
        return $this->render(':home:index.html.twig',[]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/list", name="userlist")
     */
    public function listAction(Request $request)
    {
        $groups = $this->getDoctrine()->getRepository(UserGroup::class)->findAll();

        return $this->render(':home:list.html.twig',[
            'groups' => $groups,
        ]);
    }

}