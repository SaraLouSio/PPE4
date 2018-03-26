<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of CompteController
 *
 * @author Sara
 */
class CompteController extends AbstractController {
    //put your code here

    /**
     * @Route("/compte",name="compte")
     * @return Response
     */
    public function compteController() {
        return $this->render('compte/index.html.twig');
    }
    
      /**
     * @Route("/compte/ChangerMotDePasse",name="changerMdp")
     * @return Response
     */
    public function changerMdpController() {
        return $this->render('compte/changerMdp.html.twig');
    }

}
