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
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields
    
    /**
     * @OneToMany(targetEntity="Produits")
     * @JoinColumn(name="pro_id", referencedColumnName="pro_id")
     */
    private $idProduit;
    
    /**
     * @OneToMany(targetEntity="User")
     * @JoinColumn(name="user_id", referencedColumnName="user_id")
     */
    private $idUser;
}
