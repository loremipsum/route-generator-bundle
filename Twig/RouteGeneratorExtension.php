<?php

namespace LoremIpsum\RouteGeneratorBundle\Twig;

use LoremIpsum\RouteGeneratorBundle\Exception\MissingRouteHandlerException;
use LoremIpsum\RouteGeneratorBundle\Model\RouteGeneratorInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Twig\TwigTest;

class RouteGeneratorExtension extends AbstractExtension
{
    protected RouteGeneratorInterface $routeGenerator;

    public function __construct(RouteGeneratorInterface $routeGenerator)
    {
        $this->routeGenerator = $routeGenerator;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('pathTo', [$this, 'pathTo']),
        ];
    }

    public function getTests(): array
    {
        return [
            new TwigTest('routable', [$this, 'isRoutable']),
        ];
    }

    public function pathTo($value, ?string $view = null, array $context = [], int $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->routeGenerator->generate($value, $view, $context, $referenceType);
    }

    public function isRoutable($value, ?string $view = null, array $context = [], int $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH): bool
    {
        try {
            $this->routeGenerator->generate($value, $view, $context, $referenceType);
        } catch (MissingRouteHandlerException $e) {
            return false;
        }
        return true;
    }
}
