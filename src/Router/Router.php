<?php declare(strict_types=1);

namespace App\Router;

final class Router
{
    private array $routes;

    public function get(string $uri, array $callback): void
    {
        $this->add('GET', $uri, $callback);
    }

    public function post(string $uri, array $callback): void
    {
        $this->add('POST', $uri, $callback);
    }

    public function add(string $method, string $uri, array $callback): void
    {
        $this->routes[$uri] = [
            'method'   => $method,
            'callback' => $callback,
        ];
    }

    public function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri    = trim($_SERVER['REQUEST_URI'], '/');

        if (! in_array($uri, array_keys($this->routes))) {
            throw new NotFoundException();
        }

        if ($this->routes[$uri]['method'] !== $method) {
            throw new MethodNotAllowedException();
        }

        $callback = $this->routes[$uri]['callback'];

        $controller = new $callback[0];
        $function = $callback[1];
        $controller->$function();
    }
}
