<?php

namespace LoremIpsum\RouteGeneratorBundle\Exception;

class MissingRouteHandlerException extends \Exception
{
    public function __construct($value)
    {
        parent::__construct("No route handler found for " . (is_object($value) ? get_class($value) : gettype($value)) . " '$value'");
    }
}
