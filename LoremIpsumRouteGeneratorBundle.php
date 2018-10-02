<?php

namespace LoremIpsum\RouteGeneratorBundle;

use LoremIpsum\RouteGeneratorBundle\DependencyInjection\RouteGeneratorCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class LoremIpsumRouteGeneratorBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new RouteGeneratorCompilerPass());
    }
}
