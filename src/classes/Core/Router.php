<?php

namespace Core;

class Router
{

    private $routes;

    public function __construct(array $routes) {
        $this->routes = Commons::routes_slugify($routes);
    }

    public function fetch(string $url_path) {
        if (array_key_exists($url_path, $this->routes)) {
            $view_file = $this->routes[$url_path];
            ViewsHandler::yield($view_file);
        } elseif (array_key_exists('{DEFAULT}', $this->routes)) {
            $view_file = $this->routes['{DEFAULT}'];
            ViewsHandler::yield($view_file);
        } else {
            ErrorHandler::interrupt('sys::ROUTE_NOT_FOUND', 400);
        }
    }

}