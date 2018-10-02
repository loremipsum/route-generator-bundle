<?php

namespace LoremIpsum\RouteGeneratorBundle;

interface RouteHandlerInterface
{
    public function handle($value, $view = null, $context = []);
}
