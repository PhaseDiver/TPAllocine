<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository")
 */
class Ville
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Cinema", mappedBy="ville")
     */
    private $ville_cinemas;

    public function __construct()
    {
        $this->ville_cinemas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Cinema[]
     */
    public function getVilleCinemas(): Collection
    {
        return $this->ville_cinemas;
    }

    public function addVilleCinema(Cinema $villeCinema): self
    {
        if (!$this->ville_cinemas->contains($villeCinema)) {
            $this->ville_cinemas[] = $villeCinema;
            $villeCinema->setVille($this);
        }

        return $this;
    }

    public function removeVilleCinema(Cinema $villeCinema): self
    {
        if ($this->ville_cinemas->contains($villeCinema)) {
            $this->ville_cinemas->removeElement($villeCinema);
            // set the owning side to null (unless already changed)
            if ($villeCinema->getVille() === $this) {
                $villeCinema->setVille(null);
            }
        }

        return $this;
    }
}
