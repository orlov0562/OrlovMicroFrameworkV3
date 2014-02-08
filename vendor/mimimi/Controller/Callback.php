<?php

    class Controller_Callback extends Mi
    {
        /**
         *  obj->execute('Home');
         *  Будет вызван: Controller_Home::Action_Index(array())
         *
         *  obj->instance('Home::Index', array('hello'=>'world', 1, 2));
         *  Будет вызван: Controller_Home::Action_Index('world', 1, 2)
         *
         */

        public function execute($callback, $vars=array())
        {
            $co = $this->get_callback_object($callback, $vars);

            $this->mi->{$co->controller_class}->before();

            call_user_func_array(array(
                $this->mi->{$co->controller_class},
                $co->action_method
            ), $vars);

            $this->mi->{$co->controller_class}->after();

            return $this;
        }

        public function stop($code=0)
        {
            die($code);
        }

        public function get_callback_object($callback, $vars=array())
        {
            list($controller, $action) = array_pad(explode('::',$callback), 2, 'Index');
            $ret = new stdClass();
            $ret->controller = $controller;
            $ret->action = $action;
            $ret->controller_class = 'Controller_'.$controller;
            $ret->action_method = 'Action_'.$action;
            $ret->vars = $vars;
            return $ret;
        }
    }