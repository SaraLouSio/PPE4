<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PanierRepository")
 */
class Panier {

     /**
     * @var Produits
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_id", referencedColumnName="pro_id")
     * })
     */
    private $proId;
    
    /**
     * @var User
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="user_name")
     * })
     */
    private $userId;
    
     /**
     * @ORM\Column(name="pan_quantite", type="integer")
     */
    private $panQuantite;
    
    function getProId(): Produits {
        return $this->proId;
    }

    function getUserId(): User {
        return $this->userId;
    }

    function getPanQuantite() {
        return $this->panQuantite;
    }

    function setProId(Produits $proId) {
        $this->proId = $proId;
    }

    function setUserId(User $userId) {
        $this->userId = $userId;
    }

    function setPanQuantite($panQuantite) {
        $this->panQuantite = $panQuantite;
    }


}
