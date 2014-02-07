<?php

    class Mimimi
    {
        private $instances = array();
        private $construct_params=array();

        public function __construct()
        {
            $this->app;
        }

        public function __get($class)  // Кеширует объект и возвращает его же
        {
            $class = $this->format_class_name($class);
            if (!isset($this->instances[$class]))
            {
                $this->instances[$class] = $this->get($class);
            }
            return $this->instances[$class];
        }

        public function get($class) // Создает новый объект
        {
            $class = $this->format_class_name($class);
            return new $class($this, isset($this->construct_params[$class])
                                     ? $this->construct_params[$class]
                                     : array()
            );
        }

        public function set_construct_params($params)
        {
            $this->construct_params = $params;
            return $this;
        }

        public function format_class_name($class)
        {
            $class = strtolower($class);
            $class = ucfirst($class);
            $class = preg_replace_callback('~_([a-z])~i', function($matches){
                return '_'.ucfirst($matches[1]);
            }, $class);
            return $class;
        }
    }