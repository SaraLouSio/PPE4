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
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\User;
use App\Entity\Panier;
use App\Entity\Commandes;
use App\Entity\Contenu;

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
    public function apiGetProduitUserMethodeClassique($id, EntityManagerInterface $em) {
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
     * @Route ("/apiGet/produits/all",name="getProduits")
     */
    public function apiGetAllProduitUserMethodeClassique(EntityManagerInterface $em) {
        $produits = $em->getRepository(Produits::class)->findAll();
        $serializer = $this->get('serializer');
        $data = $serializer->serialize($produits, 'json');
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
     * @Route ("/Api/Connexion",name="apiConnexion")
     */
    public function apiConnexion(Request $request, EntityManagerInterface $em) {
        $serializer = $this->get('serializer');
        $username = $request->get('username');
        $password = $request->get('password');
        //$password = password_hash($password, PASSWORD_BCRYPT, array("cost" => 13));
        $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->findOneBy([
            'userName' => $username,
        ]);


        //on cherche l'utilisateur dans la base de données
        if ($user) {
//        if ($em->getRepository(User::class)->findBy(array('userName' => $username, 'password' => $password))) {
//            $user = $em->getRepository(User::class)->findOneBy(array('userName' => $username, 'password' => $password));
            //$data = $serializer->serialize($user, 'json');
            $hash = $user->getPassword();
            $passTest = password_verify($password, $hash);
            if ($passTest) {
                $data = json_encode(array("id" => $user->getUserName()));
                $response = new Response($data);
                $response->headers->set('Content-Type', 'application/text; charset=utf-8');
                $response->headers->set('Ok', 'oui');
                return $response;
            } else {
                $response = new JsonResponse((array("erreur" => "identifiant ou mot de passe invalide !")));
                $response->headers->set('Content-Type', 'application/json');
                $response->headers->set('Non', 'non');
                return $response;
            }
        } else {
            $response = new JsonResponse((array("erreur" => "identifiant ou mot de passe invalide !")));
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('Non', 'non');
            return $response;
        }
    }

    /**
     * 
     * @Route ("/setproduit",name="api_set_produit",methods="post")
     */
    public function setProduit(Request $request, EntityManagerInterface $em) {

        $serializer = $this->get('serializer');
        $unProduit = $serializer->deserialize($request->getContent(), Produits::class, 'json');

        $em->persist($unProduit);
        $em->flush();

        $response = new Response("L'ajout est réalisé");
        $response->headers->set('Content-type', 'application/text');
        $response->headers->set('Ok', 'oui');
//        $lesDonnees = json_decode($request->getContent());
//        dump($lesDonnees);
        return $response;
    }

    /**
     * 
     * @Route ("/apiPanier/ajouter/{user}/{produit}",name="apiAjouterArticle")
     */
    public function apiAjouterArticle($user, $produit, EntityManagerInterface $em) {

//        $serializer = $this->get('serializer');
//        $data = $serializer->serialize($unProduit, 'json');
//        $response = new Response($data);
//        $response->headers->set('content-type', 'application/json');
//        $response->headers->set('Ok', 'oui');

        $panier = $this->getDoctrine()
                ->getRepository(Panier::class)
                ->findOneBy([
            'userId' => $user,
            'proId' => $produit
        ]);
//        $produit = $this->getDoctrine()
//                ->getRepository(Produits::class)
//                ->findOneBy([
//            'proId' => $id
//        ]);
        $unProduit = $em->getRepository(Produits::class)->findOneByProId($produit);
        $unUser = $em->getRepository(User::class)->findOneByUserName($user);

//        $user = $this->getDoctrine()
//                ->getRepository(User::class)
//                ->findOneBy([
//            'userName' => $this->getUser()->getUsername()
//        ]);
        if (!$panier) {
            //ajout du nouveau produit
            $nouveauPanier = new Panier;
            $nouveauPanier->setProId($unProduit);
            $nouveauPanier->setUserId($unUser);
            $nouveauPanier->setPanQuantite(1);
            $em->persist($nouveauPanier);
            $em->flush();
        } else {
            echo '<pre>';
            $actuQte = $panier->getPanQuantite();
            $panier->setPanQuantite($actuQte + 1);
            $em->persist($panier);
            $em->flush();
        }
        $response = new JsonResponse((array("succes" => "Produit ajouté avec succès")));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Non', 'non');
        return $response;
    }

    /**
     * 
     * @Route ("/apiGetPanier/{idUser}",name="apiGetPanier")
     */
    public function apiGetPanier($idUser, EntityManagerInterface $em) {
        $panier = $em->getRepository(Panier::class)->findByUserId($idUser);

        $serializer = $this->get('serializer');
        $data = $serializer->serialize($panier, 'json');
        $response = new Response($data);
        $response->headers->set('content-type', 'application/json');
        $response->headers->set('Ok', 'oui');
        return $response;
    }

    /**
     * 
     * @Route ("/apiValiderPanier/{idUser}",name="apiValiderPanier")
     */
    public function apiValiderPanier($idUser, EntityManagerInterface $em) {
        $panier = $em->getRepository(Panier::class)->findByUserId($idUser);

        $user = $this->getDoctrine()
                ->getRepository(User::class)
                ->findOneBy([
            'userName' => $idUser
        ]);

        $today = new \DateTime('now');

        $commande = new Commandes;
        $commande->setUserId($user);
        $commande->setComDate($today);
        $em->persist($commande);
        $em->flush();

        foreach ($panier as $pan) {
            $contenuCommande = new Contenu();
            $contenuCommande->setIdCommande($commande);
            $contenuCommande->setIdProduit($pan->getProId());
            $contenuCommande->setContenuPrix($pan->getProId()->getProPrix());
            $contenuCommande->setQuantite($pan->getPanQuantite());
            $em->persist($contenuCommande);
            $em->flush();
        }

        $sql = "DELETE FROM `panier` WHERE user_id = :id";
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute(['id' => $idUser]);


        $response = new JsonResponse((array("succes" => "Panier validé")));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Non', 'non');
        return $response;
    }

    /**
     * 
     * @Route ("/apiSupprPanier/{idPanier}",name="apiSupprPanier")
     */
    public function apiSupprPanier($idPanier, EntityManagerInterface $em) {
        $panier = $em->getRepository(Panier::class)->findOneByPanId($idPanier);

        $em->remove($panier);
        $sql = "DELETE FROM `panier` WHERE pan_id = :id ";
        $proId = $panier->getProId()->getProId();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute(['id' => $idPanier]);
        $em->persist($panier);
        $em->flush();

        $response = new JsonResponse((array("succes" => "Panier supprimé")));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Non', 'non');
        return $response;
    }

    /**
     * @route("/apiMoinsPanier/{idPanier}",name="apiMoinsPanier")
     * @return Response
     */
    public function apiMoinsPanier($idPanier, EntityManagerInterface $em) {
        $panier = $em->getRepository(Panier::class)->findOneByPanId($idPanier);


        $actuQte = $panier->getPanQuantite();
        $panier->setPanQuantite($actuQte - 1);
        $em->persist($panier);
        $em->flush();

        $response = new JsonResponse((array("succes" => "ok")));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Non', 'non');
        return $response;
    }

    /**
     * @route("/apiPlusPanier/{idPanier}",name="apiPlusPanier")
     * @return Response
     */
    public function apiPlusPanier($idPanier, EntityManagerInterface $em) {
        $panier = $em->getRepository(Panier::class)->findOneByPanId($idPanier);


        $actuQte = $panier->getPanQuantite();
        $panier->setPanQuantite($actuQte + 1);
        $em->persist($panier);
        $em->flush();

        $response = new JsonResponse((array("succes" => "ok")));
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Non', 'non');
        return $response;
    }
    
      /**
     * 
     * @Route ("/apiGetCommandes/{idUser}",name="apiGetCommandes")
     */
    public function apiGetCommandes($idUser,EntityManagerInterface $em) {
        $produits = $em->getRepository(Commandes::class)->findByUserId($idUser);
        $serializer = $this->get('serializer');
        $data = $serializer->serialize($produits, 'json');
        $response = new Response($data);
        $response->headers->set('content-type', 'application/json');
        $response->headers->set('Ok', 'oui');
        return $response;
    }
    
      /**
     * @Route ("/apiGetCommande/{idCommande}",name="apiGetCommande")
     * @return Response
     */
    public function apiGetCommande($idCommande,EntityManagerInterface $em) {
        $contenu = $this->getDoctrine()
                ->getRepository(Contenu::class)
                ->findBy([
            'idCommande' => $idCommande
        ]);
           $serializer = $this->get('serializer');
        $data = $serializer->serialize($contenu, 'json');
        $response = new Response($data);
        $response->headers->set('content-type', 'application/json');
        $response->headers->set('Ok', 'oui');
        return $response;
    }

}
