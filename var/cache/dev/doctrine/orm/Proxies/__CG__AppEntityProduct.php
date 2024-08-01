<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Product extends \App\Entity\Product implements \Doctrine\ORM\Proxy\InternalProxy
{
    use \Symfony\Component\VarExporter\LazyGhostTrait {
        initializeLazyObject as private;
        setLazyObjectAsInitialized as public __setInitialized;
        isLazyObjectInitialized as private;
        createLazyGhost as private;
        resetLazyObject as private;
    }

    public function __load(): void
    {
        $this->initializeLazyObject();
    }
    

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'Description' => [parent::class, 'Description', null],
        "\0".parent::class."\0".'Grade' => [parent::class, 'Grade', null],
        "\0".parent::class."\0".'Image' => [parent::class, 'Image', null],
        "\0".parent::class."\0".'IsAvailable' => [parent::class, 'IsAvailable', null],
        "\0".parent::class."\0".'Name' => [parent::class, 'Name', null],
        "\0".parent::class."\0".'id' => [parent::class, 'id', null],
        "\0".parent::class."\0".'orderProducts' => [parent::class, 'orderProducts', null],
        "\0".parent::class."\0".'price' => [parent::class, 'price', null],
        'Description' => [parent::class, 'Description', null],
        'Grade' => [parent::class, 'Grade', null],
        'Image' => [parent::class, 'Image', null],
        'IsAvailable' => [parent::class, 'IsAvailable', null],
        'Name' => [parent::class, 'Name', null],
        'id' => [parent::class, 'id', null],
        'orderProducts' => [parent::class, 'orderProducts', null],
        'price' => [parent::class, 'price', null],
    ];

    public function __isInitialized(): bool
    {
        return isset($this->lazyObjectState) && $this->isLazyObjectInitialized();
    }

    public function __serialize(): array
    {
        $properties = (array) $this;
        unset($properties["\0" . self::class . "\0lazyObjectState"]);

        return $properties;
    }
}