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
    
    #[ORM\ManyToOne(targetEntity: Seller::class, inversedBy: 'sales')]
    #[ORM\JoinColumn(name: 'id_seller_id')]
    private $id_Seller;
    
    #[ORM\ManyToOne(targetEntity: Region::class, inversedBy: 'sales')]
    #[ORM\JoinColumn(name: 'id_region_id')]
    private $id_region;

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

    public function getSale_Day(): ?String
    {
        return $this->sale_day->format('d-m-Y');
    }

    public function setSale_Day(\DateTimeInterface $sale_day): self
    {
        $this->sale_day = $sale_day;

        return $this;
    }

    public function getId_Seller(): ?Seller
    {
        return $this->id_Seller;
    }

    public function setId_Seller(?Seller $id_Seller): self
    {
        $this->id_Seller = $id_Seller;

        return $this;
    }

    public function getId_Region(): ?Region
    {
        return $this->id_region;
    }

    public function setId_Region(?Region $id_region): self
    {
        $this->id_region = $id_region;

        return $this;
    }

    
}
