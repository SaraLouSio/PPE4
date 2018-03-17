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
/**
 * Description of ProduitController
 *
 * @author Sara
 */
class ProduitController extends AbstractController {
    //put your code here
    
     /**
     * @route("/produit/{id}",name="produit")
     * @return Response
     */
    public function indexController($id) {
        
         $produit = $this->getDoctrine()
                ->getRepository(Produits::class)
                ->findBy([
                    'proId' => $id
                ]);
        if (!$produit) {
            throw $this->createNotFoundException(
                    'Aucun produits'
            );
        }
        
        return $this->render('home/produit.html.twig', array('produit' => $produit[0]));
    }
    
}
