<?php

namespace LoremIpsum\RouteGeneratorBundle\Model;

interface RouteHandlerInterface
{
    public function handle($value, $view = null, $context = []);
}
