<?php

namespace App\Entity;

use App\Repository\ChauffeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChauffeurRepository::class)
 */
class Chauffeur
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $numch;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;


    private $voitures;

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getNumch()
    {
        return $this->numch;
    }

    /**
     * @param mixed $numch
     */
    public function setNumch($numch): void
    {
        $this->numch = $numch;
    }


    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }









    public function __toString()
    {
        return (string)$this->getNumch();
    }

}
