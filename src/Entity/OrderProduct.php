<?php

namespace App\Entity;

use App\Repository\OrderProductRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: OrderProductRepository::class)]
#[ApiResource]
class OrderProduct
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'orderProducts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $Product = null;

    #[ORM\Column]
    private ?int $Quantity = null;

    #[ORM\ManyToOne(inversedBy: 'Product')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Order $Orders = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->Product;
    }

    public function setProduct(?Product $Product): static
    {
        $this->Product = $Product;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): static
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getOrders(): ?Order
    {
        return $this->Orders;
    }

    public function setOrders(?Order $Orders): static
    {
        $this->Orders = $Orders;

        return $this;
    }
}
