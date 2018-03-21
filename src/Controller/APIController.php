<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Entity\Produits;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of APiController
 *
 * @author Sara
 */
class APIController extends AbstractController {
    //put your code here

    /**
     * 
     * @Route ("/apiGet/produit/{id}",name="getProduitById")
     */
    public function apiUserMethodeClassique($id, EntityManagerInterface $em) {
        $unProduit = $em->getRepository(Produits::class)->findOneByProId($id);

        $serializer = $this->get('serializer');
        $data = $serializer->serialize($unProduit, 'json');
        $response = new Response($data);
        $response->headers->set('content-type', 'application/json');
        $response->headers->set('Ok', 'oui');
        return $response;
    }

    /**
     * 
     * @Route ("/apiGetAuto/produit/{id}",name="getProduitByIdAuto")
     */
    public function apiUserMethodeAuto(Produits $unProduit, EntityManagerInterface $em) {
        $serializer = $this->get('serializer');
        $data = $serializer->serialize($unProduit, 'json');
        $response = new Response($data);
        $response->headers->set('content-type', 'application/json');
        $response->headers->set('Ok', 'oui');
        return $response;
    }

    /**
     * 
     * @Route ("/setproduit",name="api_set_produit",methods="post")
     */
    public function setProduit(Request $request, EntityManagerInterface $em) {

        $serializer = $this->get('serializer');
        $unProduit = $serializer->deserialize($request->getContent(), Produits::class, 'json');

        dump($unProduit);die;
        $em->persist($unProduit);
        $em->flush();

        $response = new Response("L'ajout est réalisé");
        $response->headers->set('Content-type', 'application/text');
        $response->headers->set('Ok', 'oui');
//        $lesDonnees = json_decode($request->getContent());
//        dump($lesDonnees);
        return $response;
    }

}
