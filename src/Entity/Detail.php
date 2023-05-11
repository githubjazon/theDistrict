<?php

namespace App\Entity;

use App\Repository\DetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetailRepository::class)]
class Detail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column(length: 255)]
    private ?string $commande = null;

    #[ORM\Column(length: 255)]
    private ?string $plat = null;

    #[ORM\ManyToOne(inversedBy: 'Plat')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Plat $Plat = null;

    #[ORM\ManyToOne(inversedBy: 'Details')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $Detail = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getCommande(): ?string
    {
        return $this->commande;
    }

    public function setCommande(string $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getPlat(): ?string
    {
        return $this->plat;
    }

    public function setPlat(string $plat): self
    {
        $this->plat = $plat;

        return $this;
    }

    public function getDetail(): ?Commande
    {
        return $this->Detail;
    }

    public function setDetail(?Commande $Detail): self
    {
        $this->Detail = $Detail;

        return $this;
    }
}
