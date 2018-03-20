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
    private $idCommande;
    
    /**
     * @var Produits
     * @ORM\ManyToOne(targetEntity="Produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pro_id", referencedColumnName="pro_id")
     * })
     */
    private $idProduit;
    
     /**
     * @ORM\Column(name="contenu_quantite", type="integer")
     */
    private $quantite;
    
    function __toString() {
        return $this->contenuId;
    }
    
    function getContenuId() {
        return $this->contenuId;
    }

    function getIdCommande(): Commandes {
        return $this->idCommande;
    }

    function getIdProduit(): Produits {
        return $this->idProduit;
    }

    function getQuantite() {
        return $this->quantite;
    }

    function setContenuId($contenuId) {
        $this->contenuId = $contenuId;
    }

    function setIdCommande(Commandes $idCommande) {
        $this->idCommande = $idCommande;
    }

    function setIdProduit(Produits $idProduit) {
        $this->idProduit = $idProduit;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }


}
