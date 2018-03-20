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
    
    function __toString() {
        return $this->comId;
    }
    
    function getComId() {
        return $this->comId;
    }

    function getProId(){
        return $this->proId;
    }

    function getUserId(){
        return $this->userId;
    }

    function setComId($comId) {
        $this->comId = $comId;
    }

    function setProId($proId) {
        $this->proId = $proId;
    }

    function setUserId($userId) {
        $this->userId = $userId;
    }

}
