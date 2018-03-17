<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 */
class Panier {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="pan_id", type="integer")
     */
    private $PanId;
    // add your own fields
    
     /**
     * @ORM\Column(name="pan_quantite", type="integer")
     */
    private $panQuantite;
    
     /**
     * @var Produits
     *
     * @ORM\ManyToOne(targetEntity="Produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_id", referencedColumnName="pro_id")
     * })
     */
    private $proId;
    
    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_name")
     * })
     */
    private $userId;
    function getPanId() {
        return $this->PanId;
    }

    function getPanQuantite() {
        return $this->panQuantite;
    }

    function getProId(): \Produits {
        return $this->proId;
    }

    function getUserId(): \User {
        return $this->userId;
    }

    function setPanId($PanId) {
        $this->PanId = $PanId;
    }

    function setPanQuantite($panQuantite) {
        $this->panQuantite = $panQuantite;
    }

    function setProId(\Produits $proId) {
        $this->proId = $proId;
    }

    function setUserId(\User $userId) {
        $this->userId = $userId;
    }



}
