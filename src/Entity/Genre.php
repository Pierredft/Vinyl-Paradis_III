<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GenreRepository::class)]
class Genre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Disque>
     */
    #[ORM\ManyToMany(targetEntity: Disque::class, inversedBy: 'genres')]
    private Collection $genre;

    /**
     * @var Collection<int, Disque>
     */
    #[ORM\ManyToMany(targetEntity: Disque::class, mappedBy: 'genre')]
    private Collection $disques;

    public function __construct()
    {
        $this->genre = new ArrayCollection();
        $this->disques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Disque>
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Disque $genre): static
    {
        if (!$this->genre->contains($genre)) {
            $this->genre->add($genre);
        }

        return $this;
    }

    public function removeGenre(Disque $genre): static
    {
        $this->genre->removeElement($genre);

        return $this;
    }

    public function __toString()
    {
        return (string) $this->getNom();
    }

    /**
     * @return Collection<int, Disque>
     */
    public function getDisques(): Collection
    {
        return $this->disques;
    }

    public function addDisque(Disque $disque): static
    {
        if (!$this->disques->contains($disque)) {
            $this->disques->add($disque);
            $disque->addGenre($this);
        }

        return $this;
    }

    public function removeDisque(Disque $disque): static
    {
        if ($this->disques->removeElement($disque)) {
            $disque->removeGenre($this);
        }

        return $this;
    }
}
