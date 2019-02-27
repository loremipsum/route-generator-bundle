# RouteGenerator bundle

Symfony bundle to create routes to resources.

## Example route handler

```php
<?php

namespace App\RouteHandlers;

use App\Entity\User;
use LoremIpsum\RouteGeneratorBundle\Model\RouteHandlerInterface;
use Symfony\Component\Routing\RouterInterface;

class DefaultRouteHandler implements RouteHandlerInterface
{
    protected $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function handle($value, $view = null, $context = [])
    {
        if ($value instanceof User) {
            return $this->router->generate('userView', array_merge(['user' => $value->getId()], $context));
        }
        return null;
    }
}
```

## Example usage

```
{% if <entity> is routable %}
    <a href="{{ pathTo(<entity>) }}">{{ <entity> }}</a>
{% else %}
    {{ <entity> }}
{% endif %}
```