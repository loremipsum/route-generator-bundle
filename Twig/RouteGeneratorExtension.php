<?php

namespace LoremIpsum\RouteGeneratorBundle\Twig;

use LoremIpsum\RouteGeneratorBundle\Exception\MissingRouteHandlerException;
use LoremIpsum\RouteGeneratorBundle\Model\RouteGeneratorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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
            new \Twig_SimpleFunction('pathTo', [$this, 'pathTo']),
        ];
    }

    public function getTests()
    {
        return [
            new \Twig_Test('routable', [$this, 'isRoutable']),
        ];
    }

    public function pathTo($value, ?string $view = null, array $context = [], int $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->routeGenerator->generate($value, $view, $context, $referenceType);
    }

    public function isRoutable($value, ?string $view = null, array $context = [], int $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        try {
            $this->routeGenerator->generate($value, $view, $context, $referenceType);
        } catch (MissingRouteHandlerException $e) {
            return false;
        }
        return true;
    }
}
