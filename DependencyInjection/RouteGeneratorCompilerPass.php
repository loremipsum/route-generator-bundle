<?php

namespace LoremIpsum\RouteGeneratorBundle\DependencyInjection;

use LoremIpsum\RouteGeneratorBundle\RouteGenerator;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class RouteGeneratorCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (! $container->has(RouteGenerator::class)) {
            return;
        }

        $definition = $container->findDefinition(RouteGenerator::class);

        $taggedServices = $container->findTaggedServiceIds('loremipsum.route_handler');

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addRouteHandler', [new Reference($id)]);
        }
    }
}
