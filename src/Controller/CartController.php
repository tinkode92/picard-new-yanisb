<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderProduct;
use App\Entity\Product;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private $entityManager;
    private $productRepository;
    private $orderRepository;

    public function __construct(EntityManagerInterface $entityManager, ProductRepository $productRepository, OrderRepository $orderRepository)
    {
        $this->entityManager = $entityManager;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * @Route("/cart/add", name="cart_add", methods={"POST"})
     */
    public function addProductToCart(Request $request): JsonResponse
    {
        $productId = $request->get('product_id');
        $quantity = $request->get('quantity', 1); // Default quantity is 1

        // Retrieve the product
        $product = $this->productRepository->find($productId);
        if (!$product) {
            return new JsonResponse(['error' => 'Product not found'], 404);
        }

        // Retrieve or create the order (cart)
        // Assuming there's a method to get the current user's cart/order
        $order = $this->getCurrentOrder();

        if (!$order) {
            $order = new Order();
            $order->setUser($this->getUser());
            $this->entityManager->persist($order);
        }

        // Create a new OrderProduct
        $orderProduct = new OrderProduct();
        $orderProduct->setProduct($product);
        $orderProduct->setQuantity($quantity);
        $orderProduct->setOrders($order);

        // Persist the OrderProduct
        $this->entityManager->persist($orderProduct);
        $this->entityManager->flush();

        return new JsonResponse(['message' => 'Product added to cart'], 201);
    }

    private function getCurrentOrder(): ?Order
    {
        // Logic to retrieve the current user's open order (cart)
        // This can be done based on session, user ID, etc.
        return $this->orderRepository->findOneBy(['user' => $this->getUser(), 'status' => 'open']);
    }
}
