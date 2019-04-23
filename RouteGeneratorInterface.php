<?php

namespace LoremIpsum\RouteGeneratorBundle;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

interface RouteGeneratorInterface
{
    public function generate($value, $view = null, $context = [], $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH);

    public function addRouteHandler(RouteHandlerInterface $handler);

    public function getRouter();
}
