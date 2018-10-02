<?php

namespace LoremIpsum\RouteGeneratorBundle;

interface RouteGeneratorInterface
{
    public function generate($value, $view = null, $context = []);

    public function addRouteHandler(RouteHandlerInterface $handler);

    public function getRouter();
}
