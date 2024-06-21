<?php

namespace App\Entity;

use App\Repository\UserInfoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserInfoRepository::class)]
class UserInfo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $numMaison = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $extension = null;

    #[ORM\Column(length: 255)]
    private ?string $nomRue = null;

    #[ORM\Column(length: 255)]
    private ?string $nomVille = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lieuxDit = null;

    #[ORM\Column(length: 255)]
    private ?string $codePostal = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\Column(length: 255)]
    private ?string $numGSM = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumMaison(): ?string
    {
        return $this->numMaison;
    }

    public function setNumMaison(string $numMaison): static
    {
        $this->numMaison = $numMaison;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(?string $extension): static
    {
        $this->extension = $extension;

        return $this;
    }

    public function getNomRue(): ?string
    {
        return $this->nomRue;
    }

    public function setNomRue(string $nomRue): static
    {
        $this->nomRue = $nomRue;

        return $this;
    }

    public function getNomVille(): ?string
    {
        return $this->nomVille;
    }

    public function setNomVille(string $nomVille): static
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    public function getLieuxDit(): ?string
    {
        return $this->lieuxDit;
    }

    public function setLieuxDit(?string $lieuxDit): static
    {
        $this->lieuxDit = $lieuxDit;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getNumGSM(): ?string
    {
        return $this->numGSM;
    }

    public function setNumGSM(string $numGSM): static
    {
        $this->numGSM = $numGSM;

        return $this;
    }
}
