<?php

namespace LoremIpsum\RouteGeneratorBundle\Model;

use LoremIpsum\RouteGeneratorBundle\Exception\MissingRouteHandlerException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

interface RouteGeneratorInterface
{
    /**
     * @param mixed       $value
     * @param string|null $view
     * @param array       $context
     * @param int         $referenceType
     * @return mixed
     * @throws MissingRouteHandlerException
     */
    public function generate($value, ?string $view = null, array $context = [], int $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH);

    public function addRouteHandler(RouteHandlerInterface $handler);

    public function getRouter();
}
