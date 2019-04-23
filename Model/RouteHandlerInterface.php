<?php

namespace LoremIpsum\RouteGeneratorBundle\Model;

interface RouteHandlerInterface
{
    /**
     * @param mixed       $value
     * @param string|null $view
     * @param array       $context
     * @param int         $referenceType
     * @return mixed
     */
    public function handle($value, ?string $view, array $context, int $referenceType);
}
