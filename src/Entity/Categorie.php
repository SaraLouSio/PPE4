<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="cat_id", type="integer")
     */
    private $id;

     /**
     * @ORM\Column(name="cat_libelle", type="string", length=255, nullable=false)
     */
     private $libelle;
     
    
}
