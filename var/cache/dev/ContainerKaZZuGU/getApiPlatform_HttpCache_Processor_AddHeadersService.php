<?php

namespace ContainerKaZZuGU;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_HttpCache_Processor_AddHeadersService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'api_platform.http_cache.processor.add_headers' shared service.
     *
     * @return \ApiPlatform\HttpCache\State\AddHeadersProcessor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/ProcessorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/HttpCache/State/AddHeadersProcessor.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/Processor/AddLinkHeaderProcessor.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/Util/CorsTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Hydra/State/HydraLinkProcessor.php';
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/State/Processor/RespondProcessor.php';

        return $container->privates['api_platform.http_cache.processor.add_headers'] = new \ApiPlatform\HttpCache\State\AddHeadersProcessor(new \ApiPlatform\State\Processor\AddLinkHeaderProcessor(new \ApiPlatform\Hydra\State\HydraLinkProcessor(new \ApiPlatform\State\Processor\RespondProcessor(($container->privates['api_platform.symfony.iri_converter'] ?? self::getApiPlatform_Symfony_IriConverterService($container)), ($container->privates['api_platform.resource_class_resolver'] ?? self::getApiPlatform_ResourceClassResolverService($container)), ($container->privates['api_platform.metadata.operation.metadata_factory'] ?? self::getApiPlatform_Metadata_Operation_MetadataFactoryService($container))), ($container->privates['api_platform.router'] ?? self::getApiPlatform_RouterService($container)))), true, NULL, NULL, $container->parameters['api_platform.http_cache.vary'], NULL);
    }
}