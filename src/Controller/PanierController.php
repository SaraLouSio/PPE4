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
use App\Entity\Produits;
use App\Entity\Panier;
/**
 * Description of PanierController
 *
 * @author Sara
 */
class PanierController extends AbstractController {
    //put your code here
    
     /**
     * @route("/panier",name="panier")
     * @return Response
     */
     public function panierController() {
        
         $panier = $this->getDoctrine()
                ->getRepository(Panier::class)
                ->findBy([
                    'userId' => $this->getUser()->getUsername()
                ]);
//        if (!$panier) {
//            throw $this->createNotFoundException(
//                    'Aucun produits présents dans le panier'
//            );
//        }
        
        return $this->render('home/produit.html.twig', array('panier' => $panier));
    }
    
     /**
     * @route("/ajoutPanier{id}",name="panier")
     * @return Response
     */
     public function ajoutPanierController($id) {
        
         $panier = $this->getDoctrine()
                ->getRepository(Panier::class)
                ->findBy([
                    'userId' => $this->getUser()->getUsername(),
                    'proId' => $id
                ]);
         if(!panier){
             //ajout du nouveau produit
         } else {
             //incrementer
         }

        
        return $this->redirect($this->generateUrl('panier'));
    }
}
