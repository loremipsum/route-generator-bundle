<?php

namespace LoremIpsum\RouteGeneratorBundle\Twig;

use LoremIpsum\RouteGeneratorBundle\Exception\MissingRouteHandlerException;
use LoremIpsum\RouteGeneratorBundle\Model\RouteGeneratorInterface;
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

    public function getTests()
    {
        return [
            new \Twig_Test('routable', [$this, 'isRoutable']),
        ];
    }

    public function pathTo($value, $view = null, $context = [])
    {
        return $this->routeGenerator->generate($value, $view, $context);
    }

    public function isRoutable($value, $view = null, $context = [])
    {
        try {
            $this->routeGenerator->generate($value, $view, $context);
        } catch (MissingRouteHandlerException $e) {
            return false;
        }
        return true;
    }
}
