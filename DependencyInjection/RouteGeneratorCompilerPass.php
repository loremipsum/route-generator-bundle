<?php

namespace LoremIpsum\RouteGeneratorBundle\DependencyInjection;

use LoremIpsum\RouteGeneratorBundle\Utils\RouteGenerator;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RouteGeneratorCompilerPass implements CompilerPassInterface
{
    const ROUTEHANDLER_TAG = 'loremipsum.route_handler';

    public function process(ContainerBuilder $container)
    {
        if (! $container->has(RouteGenerator::class)) {
            return;
        }

        $definition     = $container->findDefinition(RouteGenerator::class);
        $taggedServices = $container->findTaggedServiceIds(self::ROUTEHANDLER_TAG);

        foreach (array_keys($taggedServices) as $id) {
            $definition->addMethodCall('addRouteHandler', [new Reference($id)]);
        }
    }
}
