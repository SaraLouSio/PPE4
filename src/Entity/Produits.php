<?php

namespace App\Entity;
//TODO : recréer classe produit 
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitsRepository")
 */
class Produits
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="pro_id", type="integer")
     */
    private $id;

     /**
     * @ORM\Column(name="pro_nom", type="string" length=255, nullable=false)
     */
     private $nom;
     
      /**
     * @ORM\Column(name="pro_prix", type="integer" nullable=false)
     */
     private $prix;
     
      /**
     * @ORM\Column(name="pro_active",  type="boolean", nullable=false)
     */
     private $active;
     
      /**
     * @ORM\Column(name="pro_date",  type="date", nullable=false)
     */
     private $date;
     
      /**
     * @ORM\Column(name="pro_image", type="string" length=255, nullable=false)
     */
     private $image;
     
      /**
     * @ORM\Column(name="cat_id", type="integer" nullable=false options={"default" : 1})
     */
     private $categorie;
     
     
      /**
     * @ORM\Column(name="sou_cat_id", type="integer" nullable=false options={"default" : 1})
     */
     private $sousCategorie;
}
