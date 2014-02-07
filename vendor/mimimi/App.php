<?php

    class App extends Mi
    {
        public function start()
        {
            if ($route = $this->get_route()) {
                $this->mi->registry->route = $route;
                $this->mi->route->execute($route->callback, $route->vars);
            }
        }

        private function get_route()
        {
            $ret = null;

            if ($routes = $this->mi->config->get('routes'))
            {
                foreach($routes as $route)
                {
                    if (preg_match($route->regexp, $this->mi->request->uri, $regs))
                    {
                        $route->vars = $regs;
                        $ret = $route;
                        break;
                    }
                }
            }

            return $ret;
        }

    }