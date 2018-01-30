<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author Sara
 */
class HomeController extends AbstractController {
    //put your code here

    /**
     * @route("/",name="home")
     * @return Response
     */
    public function indexController() {
        return $this->render('home/index.html.twig');
    }
    
    /**
     * @Route("/visiteur",name="visiteur")
     * @return Response
     */
    public function visiteurController(){
        return $this->render('visiteur/visiteur.html.twig');
    }
    
     /**
     * @Route("/perso",name="perso")
     * @return Response
     */
    public function persoController(){
        return $this->render('perso/perso.html.twig');
    }

}
