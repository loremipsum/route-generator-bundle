<?php

namespace LoremIpsum\RouteGeneratorBundle\Twig;

use LoremIpsum\RouteGeneratorBundle\RouteGeneratorInterface;
use Twig\Extension\AbstractExtension;

class RouteGeneratorExtension extends AbstractExtension
{
    /**
     * @var RouteGeneratorInterface
     */
    protected $routeGenerator;

    public function __construct(RouteGeneratorInterface $routeGenerator)
    {
        $this->routeGenerator = $routeGenerator;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('pathTo', [$this, 'pathTo'])
        ];
    }

    public function pathTo($value, $view = null, $context = [])
    {
        return $this->routeGenerator->generate($value, $view, $context);
    }
}
