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
    private $id;
    // add your own fields
    
     /**
     * @ORM\Column(name="pan_quantite", type="integer")
     */
    private $quantite;
    
    /**
     * @ORM\OneToMany(targetEntity="Produits", mappedBy="Panier")
     * @ORM\JoinColumn(name="pro_id", referencedColumnName="pro_id")
     */
    private $idProduit;
    
    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="Panier")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $idUser;

}
