<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Entity;

/**
 * Description of Contenu
 *
 * @author windows
 */
class Contenu {
      
    /**
     * @OneToMany(targetEntity="Commandes")
     * @JoinColumn(name="com_id", referencedColumnName="com_id")
     */
    private $idCommande;
    
   /**
     * @OneToMany(targetEntity="Produits")
     * @JoinColumn(name="pro_id", referencedColumnName="pro_id")
     */
    private $idProduit;
    
     /**
     * @ORM\Column(name="com_quantite", type="integer")
     */
    private $quantite;
    
}
