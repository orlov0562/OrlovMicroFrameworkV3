<?php

    class App extends Mi
    {
        public function start()
        {
            $routes = $this->mi->config->get('routes');
            $path = $this->mi->request->uri;
            if ($route = $this->mi->router->get_route($routes, $path)) {
                $this->mi->registry->route = $route;
                $this->mi->route->execute($route->callback, $route->vars);
            }
        }
    }