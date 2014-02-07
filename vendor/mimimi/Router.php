<?php
    class Router extends Mi
    {
        public function get_route($routes, $path)
        {
            $ret = null;

            foreach($routes as $route)
            {
                if (preg_match($route->regexp, $path, $regs))
                {
                    $route->vars = $regs;
                    $ret = $route;
                    break;
                }
            }

            return $ret;
        }
    }