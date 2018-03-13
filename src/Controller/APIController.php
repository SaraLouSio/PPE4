<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Flex\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of APiController
 *
 * @author Sara
 */
class APIController {
    //put your code here

    /**
     * 
     * @Route ("/usersClassique/{id}",name="un_user_cla")
     */
    public function apiUserMethodeClassique($id, EntityManagerInterface $em) {
        $unUser = $em->getRepository(User::class)->findById($id);
        $serializer = $this->get('serializer');
        $data = $serializer->serialize($unUser[0], 'json');
        $response = new Response($data);
        $response->headers->set('content-type', 'application/json');
        $response->headers->set('Ok', 'oui');
        return $response;
    }

}
