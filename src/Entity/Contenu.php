<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContenuRepository")
 */
class Contenu {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="contenu_id", type="integer")
     */
    private $contenuId;

    /**
     * @var Commandes
     * @ORM\ManyToOne(targetEntity="Commandes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="com_id", referencedColumnName="com_id")
     * })
     */
    private $comId;

    /**
     * @var Produits
     * @ORM\ManyToOne(targetEntity="Produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_id", referencedColumnName="pro_id")
     * })
     */
    private $proId;

    /**
     * @ORM\Column(name="contenu_quantite", type="integer")
     */
    private $contenuQuantite;
    
    /**
     * @ORM\Column(name="contenu_prix", type="integer")
     */
    private $contenuPrix;

    public function __toString() {
        return $this->contenuId;
    }

    function getContenuId() {
        return $this->contenuId;
    }
    
    function getComId(){
        return $this->comId;
    }

    function getProId(){
        return $this->proId;
    }

    function getContenuQuantite() {
        return $this->contenuQuantite;
    }

    function getContenuPrix() {
        return $this->contenuPrix;
    }

    function setComId($comId) {
        $this->comId = $comId;
    }

    function setProId($proId) {
        $this->proId = $proId;
    }

    function setContenuQuantite($contenuQuantite) {
        $this->contenuQuantite = $contenuQuantite;
    }

    function setContenuPrix($contenuPrix) {
        $this->contenuPrix = $contenuPrix;
    }




}
