<?php

    class Route extends Mi
    {

        public function create($params)
        {

            if (is_string($params))
            {
                $regexp = '
                    IF \s* `([^`]+)` \s*
                    THEN \s* `([^`]+)` \s*
                    (?:AS \s* `([^`]+)`)?
                ';
                if (preg_match('~^'.$regexp.'$~Usix', $params, $regs))
                {
                    $params = array(
                        'regexp' => $regs[1],
                        'callback' => $regs[2],
                        'name' => $regs[3],
                    );
                }
            }

            if (!isset($params['regexp']))
            {
                throw new Exception('Undefined regexp in route');
            }

            if (!isset($params['callback']))
            {
                throw new Exception('Undefined callback in route');
            }

            if (!isset($params['name']))
            {
                $params['name'] = 'default';
            }


            return (object) $params;
        }

        /**
         *  obj->execute('Home');
         *  Будет вызван: Controller_Home::Action_Index(array())
         *
         *  obj->instance('Home::Index', array('hello'=>'world', 1, 2));
         *  Будет вызван: Controller_Home::Action_Index('world', 1, 2)
         *
         */

        public function execute($callback, $action)
        {
            list($controller, $action) = array_pad(explode('::',$callback), 2, 'Index');

            $controller = 'Controller_'.$controller;
            $action = 'Action_'.$action;

            $this->mi->$controller->before();
            $this->mi->$controller->$action($vars);
            $this->mi->$controller->after();
        }

        public function get_controller_from_callback($callback)
        {
            list($controller, ) = explode('::',$callback);
            return 'Controller_'.$controller;
        }

        public function get_action_from_callback($callback)
        {
            list(, $action) = array_pad(explode('::',$callback), 2, 'Index');
            return 'Action_'.$action;
        }

    }