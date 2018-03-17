<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandesRepository")
 */
class Commandes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="com_id", type="integer")
     */
    private $comId;

    // add your own fields
    
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
    function getComId() {
        return $this->comId;
    }

    function getProId(): \Produits {
        return $this->proId;
    }

    function getUserId(): \User {
        return $this->userId;
    }

    function setComId($comId) {
        $this->comId = $comId;
    }

    function setProId(\Produits $proId) {
        $this->proId = $proId;
    }

    function setUserId(\User $userId) {
        $this->userId = $userId;
    }


}
