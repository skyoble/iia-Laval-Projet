<?php

namespace App\Entity;

use App\Repository\SaleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaleRepository::class)]
#[ORM\Table(name: '`sale`')]
class Sale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $montant;

    #[ORM\Column(type: 'date')]
    private $sale_day;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getSaleDay(): ?\DateTimeInterface
    {
        return $this->sale_day;
    }

    public function setSaleDay(\DateTimeInterface $sale_day): self
    {
        $this->sale_day = $sale_day;

        return $this;
    }
}
