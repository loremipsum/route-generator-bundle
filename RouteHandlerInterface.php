<?php

namespace LoremIpsum\RouteGeneratorBundle;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

interface RouteHandlerInterface
{
    public function handle($value, $view = null, $context = [], $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH);
}
