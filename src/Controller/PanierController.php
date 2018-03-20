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
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
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
        
        return $this->render('home/panier.html.twig', array('panier' => $panier));
    }
    
     /**
     * @route("/ajoutPanier{id}",name="ajoutPanier")
     * @return Response
     */
     public function ajoutPanierController($id, EntityManagerInterface $em) {
        
         $panier = $this->getDoctrine()
                ->getRepository(Panier::class)
                ->findBy([
                    'userId' => $this->getUser()->getUsername(),
                    'proId' => $id
                ]);
         $produit = $this->getDoctrine()
                ->getRepository(Produits::class)
                ->findOneBy([
                    'proId' => $id
                ]);
         
         $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->findOneBy([
                    'userName' => $this->getUser()->getUsername()
                ]);
                
         if(!$panier){
             //ajout du nouveau produit
            $nouveauPanier = new Panier;
            $nouveauPanier->setProId($produit);
            $nouveauPanier->setUserId($user);
            $nouveauPanier->setPanQuantite(1);
            $em->persist($nouveauPanier);
            $em->flush();
         } else {
             //incrementer
         }
         
        return $this->redirect($this->generateUrl('panier'));
    }
}
