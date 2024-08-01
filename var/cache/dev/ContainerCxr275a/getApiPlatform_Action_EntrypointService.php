<?php

namespace ContainerCxr275a;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getApiPlatform_Action_EntrypointService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'api_platform.action.entrypoint' shared service.
     *
     * @return \ApiPlatform\Symfony\Action\EntrypointAction
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/api-platform/core/src/Symfony/Action/EntrypointAction.php';

        return $container->services['api_platform.action.entrypoint'] = new \ApiPlatform\Symfony\Action\EntrypointAction(($container->privates['api_platform.metadata.resource.name_collection_factory.cached'] ?? self::getApiPlatform_Metadata_Resource_NameCollectionFactory_CachedService($container)), ($container->privates['api_platform.state_provider.documentation.content_negotiation'] ?? $container->load('getApiPlatform_StateProvider_Documentation_ContentNegotiationService')), ($container->privates['api_platform.state_processor.documentation.write'] ?? $container->load('getApiPlatform_StateProcessor_Documentation_WriteService')), $container->parameters['api_platform.docs_formats']);
    }
}
