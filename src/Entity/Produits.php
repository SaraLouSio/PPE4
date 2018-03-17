<?php

namespace App\Entity;

//TODO : recréer classe produit 
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitsRepository")
 */
class Produits {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="pro_id", type="integer")
     */
    private $proId;

    /**
     * @ORM\Column(name="pro_nom", type="string", length=255, nullable=false)
     */
    private $proNom;

    /**
     * @ORM\Column(name="pro_prix", type="integer", nullable=false)
     */
    private $proPrix;

    /**
     * @ORM\Column(name="pro_active",  type="boolean", nullable=false)
     */
    private $proActive;

    /**
     * @ORM\Column(name="pro_date",  type="date", nullable=false)
     */
    private $proDate;

    /**
     * @ORM\Column(name="pro_image", type="string", length=500, nullable=false , options={"default" : "http://manutentionquebec.com/wp-content/themes/manutentionquebe/images/aucune-image.jpg"})
     */
    private $proImage;

    /**
     * @ORM\Column(name="pro_Resume", type="string", length=1500, nullable=false)
     */
    private $proResume;

    /**
     * @var Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cat_id", referencedColumnName="cat_id")
     * })
     * 
     */
    private $catId;

    public function __construct() {
        $this->catId = new Categorie();
        $this->proDate = new DateTime('now');
    }

    function getProId() {
        return $this->proId;
    }

    function getProNom() {
        return $this->proNom;
    }

    function getProPrix() {
        return $this->proPrix;
    }

    function getProActive() {
        return $this->proActive;
    }

    function getProDate() {
        return $this->proDate;
    }

    function getProImage() {
        return $this->proImage;
    }

    function getCatId(): Categorie {
        return $this->catId;
    }
    
    function getProResume() {
        return $this->proResume;
    }

    function setProId($proId) {
        $this->proId = $proId;
    }

    function setProNom($proNom) {
        $this->proNom = $proNom;
    }

    function setProPrix($proPrix) {
        $this->proPrix = $proPrix;
    }

    function setProActive($proActive) {
        $this->proActive = $proActive;
    }

    function setProDate($proDate) {
        $this->proDate = $proDate;
    }

    function setProImage($proImage) {
        $this->proImage = $proImage;
    }

    function setCatId($catId) {
        $this->catId = $catId;
    }

    function setProResume($proResume) {
        $this->$proResume = $proResume;
    }


}
