<?php

    class App extends Mi
    {
        public function start()
        {

            $this->mi->system->show_php_errors();

            $routes = $this->mi->config->get('routes');
            $path = $this->mi->request->uri;

            if ($route = $this->mi->router->get_route($routes, $path)) {

                $this->mi->registry->route = $route;

                $this->mi->registry->callback = $this->mi->controller_callback->get_callback_object(
                    $route->callback,
                    $route->vars
                );

                $this->mi->controller_callback->execute($route->callback, $route->vars);
            }

        }
    }