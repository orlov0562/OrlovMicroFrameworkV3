<?php

    class Registry extends Mi
    {
        private $store = array();

        public function __set($var, $val)
        {
            return $this->set($var, $val);
        }

        public function __get($var)
        {
            return $this->get($var);
        }

        public function set($var, $val)
        {
            $this->store[$var] = $val;
            return $this;
        }

        public function get($var, $default=null)
        {
            return isset($this->store[$var])
                   ? $this->store[$var]
                   : $default
            ;
        }

        public function load(array $data)
        {
            foreach($data as $var=>$val) $this->set($var, $val);
            return $this;
        }


    }