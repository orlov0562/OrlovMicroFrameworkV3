<?php

    class Route extends Mi
    {
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