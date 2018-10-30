<?php

namespace LoremIpsum\RouteGeneratorBundle\DependencyInjection;

use LoremIpsum\RouteGeneratorBundle\RouteGenerator;
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

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addRouteHandler', [new Reference($id)]);
        }
    }
}
