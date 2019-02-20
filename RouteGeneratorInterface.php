<?php

namespace LoremIpsum\RouteGeneratorBundle;

use LoremIpsum\RouteGeneratorBundle\Exception\MissingRouteHandlerException;

interface RouteGeneratorInterface
{
    /**
     * @param mixed       $value
     * @param string|null $view
     * @param array       $context
     * @return mixed
     * @throws MissingRouteHandlerException
     */
    public function generate($value, $view = null, $context = []);

    public function addRouteHandler(RouteHandlerInterface $handler);

    public function getRouter();
}
