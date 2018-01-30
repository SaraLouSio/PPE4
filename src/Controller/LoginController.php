<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
/**
 * Description of LoginController
 *
 * @author Sara
 */
class LoginController extends AbstractController {
    //put your code here

    /**
     * @Route("/login",name="login")
     */
    public function login(AuthenticationUtils $auth) {
        $erreur = $auth->getLastAuthenticationError();
        $lastUserName = $auth->getLastUserName();

        return $this->render('login/login.html.twig', array(
                    'last_username' => $lastUserName, 'error' => $erreur
        ));
    }

}
