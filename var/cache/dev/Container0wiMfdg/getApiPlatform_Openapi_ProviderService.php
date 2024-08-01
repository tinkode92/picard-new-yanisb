<?php

namespace Container0wiMfdg;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Openapi_ProviderService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'api_platform.openapi.provider' shared service.
     *
     * @return \ApiPlatform\OpenApi\State\OpenApiProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/OpenApi/State/OpenApiProvider.php';

        return $container->privates['api_platform.openapi.provider'] = new \ApiPlatform\OpenApi\State\OpenApiProvider(($container->privates['api_platform.openapi.factory'] ?? self::getApiPlatform_Openapi_FactoryService($container)));
    }
}