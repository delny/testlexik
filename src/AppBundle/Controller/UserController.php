<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 24/11/2017
 * Time: 13:29
 */

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\Form\UserType;
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

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/usernew", name="usernew")
     */
    public function newAction(Request $request)
    {
        //call manager
        $userManager = $this->getUserManager();

        //create instance user
        $user = $userManager->create();

        //create form
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $userManager->save($user);
            return $this->redirectToRoute('userlist');
        }

        return $this->render(':user:new.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/userdel/{id}", name="userdel")
     */
    public function delAction(User $user, Request $request)
    {
        //call manager
        $userManager = $this->getUserManager();

        //delete video
        $userManager->delete($user);

        return $this->redirectToRoute('userlist');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/search", name="search")
     */
    public function searchAction(Request $request)
    {
        //call usergroupmanager
        $userManager = $this->get('app.user.manager');

        $users = $userManager->lookFor($request->query->get('search'));

        return $this->render(':home:search.html.twig',[
            'users' => $users,
        ]);
    }

    /**
     * @return \AppBundle\Manager\UserManager|object
     */
    private function getUserManager()
    {
        return $this->get('app.user.manager');
    }

}
