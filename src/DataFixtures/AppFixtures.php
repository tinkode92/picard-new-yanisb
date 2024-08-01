<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Order;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        // Création de faux produits
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName($faker->word);
            $product->setImage($faker->imageUrl());
            $product->setDescription($faker->sentence);
            $product->setPrice($faker->randomFloat(2, 5, 100));
            $product->setGrade($faker->numberBetween(1, 5));
            $product->setAvailable($faker->boolean); // Utilisation de setAvailable() au lieu de setIsAvailable()

            $manager->persist($product);
        }

        // Création de fausses commandes
        for ($i = 0; $i < 10; $i++) {
            $order = new Order();
            $order->setUser($faker->name);
            $order->setCreatedAt($faker->dateTimeThisYear);
            $order->setStatus('open');

            $manager->persist($order);
        }

        $manager->flush();
    }
}
