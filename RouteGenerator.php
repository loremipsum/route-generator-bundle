<?php

namespace LoremIpsum\RouteGeneratorBundle;

use LoremIpsum\RouteGeneratorBundle\Exception\MissingRouteHandlerException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\RouterInterface;

class RouteGenerator implements RouteGeneratorInterface
{
    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * @var RouteHandlerInterface[]
     */
    protected $handlers = [];

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function generate($value, $view = null, $context = [], $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        foreach ($this->handlers as $handler) {
            $route = $handler->handle($value, $view, $context, $referenceType);
            if ($route) {
                return $route;
            }
        }

        throw new MissingRouteHandlerException($value);
    }

    public function addRouteHandler(RouteHandlerInterface $handler)
    {
        $this->handlers[] = $handler;
    }

    public function getRouter()
    {
        return $this->router;
    }
}
