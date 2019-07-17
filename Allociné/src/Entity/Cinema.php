<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CinemaRepository")
 */
class Cinema
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
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Films", mappedBy="cinema")
     */
    private $cinema_affiches;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Ville", inversedBy="ville_cinemas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    public function __construct()
    {
        $this->cinema_affiches = new ArrayCollection();
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|Films[]
     */
    public function getCinemaAffiches(): Collection
    {
        return $this->cinema_affiches;
    }

    public function addCinemaAffich(Films $cinemaAffich): self
    {
        if (!$this->cinema_affiches->contains($cinemaAffich)) {
            $this->cinema_affiches[] = $cinemaAffich;
            $cinemaAffich->setCinema($this);
        }

        return $this;
    }

    public function removeCinemaAffich(Films $cinemaAffich): self
    {
        if ($this->cinema_affiches->contains($cinemaAffich)) {
            $this->cinema_affiches->removeElement($cinemaAffich);
            // set the owning side to null (unless already changed)
            if ($cinemaAffich->getCinema() === $this) {
                $cinemaAffich->setCinema(null);
            }
        }

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}
