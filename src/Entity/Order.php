<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
#[ApiResource]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, OrderProduct>
     */
    #[ORM\OneToMany(targetEntity: OrderProduct::class, mappedBy: 'Orders')]
    private Collection $Product;

    public function __construct()
    {
        $this->Product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, OrderProduct>
     */
    public function getProduct(): Collection
    {
        return $this->Product;
    }

    public function addProduct(OrderProduct $product): static
    {
        if (!$this->Product->contains($product)) {
            $this->Product->add($product);
            $product->setOrders($this);
        }

        return $this;
    }

    public function removeProduct(OrderProduct $product): static
    {
        if ($this->Product->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getOrders() === $this) {
                $product->setOrders(null);
            }
        }

        return $this;
    }
}
