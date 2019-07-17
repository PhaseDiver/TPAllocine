<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FilmsRepository")
 */
class Films
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $synopsis;

    /**
     * @ORM\Column(type="time")
     */
    private $duree;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datesortie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Acteurs", mappedBy="film_acteurs")
     */
    private $film_casting;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Genre", mappedBy="relation")
     */
    private $film_genres;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cinema", inversedBy="cinema_affiches")
     */
    private $cinema;

    public function __construct()
    {
        $this->film_casting = new ArrayCollection();
        $this->film_genres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDatesortie(): ?\DateTimeInterface
    {
        return $this->datesortie;
    }

    public function setDatesortie(\DateTimeInterface $datesortie): self
    {
        $this->datesortie = $datesortie;

        return $this;
    }

    /**
     * @return Collection|Acteurs[]
     */
    public function getFilmCasting(): Collection
    {
        return $this->film_casting;
    }

    public function addFilmCasting(Acteurs $filmCasting): self
    {
        if (!$this->film_casting->contains($filmCasting)) {
            $this->film_casting[] = $filmCasting;
            $filmCasting->setFilmActeurs($this);
        }

        return $this;
    }

    public function removeFilmCasting(Acteurs $filmCasting): self
    {
        if ($this->film_casting->contains($filmCasting)) {
            $this->film_casting->removeElement($filmCasting);
            // set the owning side to null (unless already changed)
            if ($filmCasting->getFilmActeurs() === $this) {
                $filmCasting->setFilmActeurs(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getFilmGenres(): Collection
    {
        return $this->film_genres;
    }

    public function addFilmGenre(Genre $filmGenre): self
    {
        if (!$this->film_genres->contains($filmGenre)) {
            $this->film_genres[] = $filmGenre;
            $filmGenre->addRelation($this);
        }

        return $this;
    }

    public function removeFilmGenre(Genre $filmGenre): self
    {
        if ($this->film_genres->contains($filmGenre)) {
            $this->film_genres->removeElement($filmGenre);
            $filmGenre->removeRelation($this);
        }

        return $this;
    }

    public function getCinema(): ?Cinema
    {
        return $this->cinema;
    }

    public function setCinema(?Cinema $cinema): self
    {
        $this->cinema = $cinema;

        return $this;
    }
}
