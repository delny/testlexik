<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 24/11/2017
 * Time: 13:29
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @param User $user
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/detail/{id}",name="userdetail")
     */
    public function detailAction(User $user,Request $request)
    {
        return $this->render(':user:detail.html.twig',[
           'user' => $user,
        ]);
    }


}
