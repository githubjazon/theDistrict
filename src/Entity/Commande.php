<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_commande = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $total = null;

    #[ORM\Column]
    private ?int $etat = null;

    #[ORM\Column(length: 255)]
    private ?string $details = null;

    #[ORM\Column(length: 255)]
    private ?string $utilisateur = null;

    #[ORM\OneToMany(mappedBy: 'Detail', targetEntity: Detail::class)]
    private Collection $Details;

    #[ORM\ManyToOne(inversedBy: 'Commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $Commande = null;

    public function __construct()
    {
        $this->Details = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->date_commande;
    }

    public function setDateCommande(\DateTimeInterface $date_commande): self
    {
        $this->date_commande = $date_commande;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getUtilisateur(): ?string
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(string $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function addDetail(Detail $detail): self
    {
        if (!$this->Details->contains($detail)) {
            $this->Details->add($detail);
            $detail->setDetail($this);
        }

        return $this;
    }

    public function removeDetail(Detail $detail): self
    {
        if ($this->Details->removeElement($detail)) {
            // set the owning side to null (unless already changed)
            if ($detail->getDetail() === $this) {
                $detail->setDetail(null);
            }
        }

        return $this;
    }

    public function getCommande(): ?Utilisateur
    {
        return $this->Commande;
    }

    public function setCommande(?Utilisateur $Commande): self
    {
        $this->Commande = $Commande;

        return $this;
    }
}
