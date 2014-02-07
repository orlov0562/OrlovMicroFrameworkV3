<?php

    class Config extends Mi
    {
        private $configs = array();

        protected $params = array(
            'base_dir' => './'
        );

        public function get($path, $default=null)
        {
            if (isset($this->configs[$path]))
            {
                $val = $this->configs[$path];
            }
            else
            {
                $val = $this->load_from_file($path, $default);
                $this->configs[$path] = $val;
            }
            return $val;
        }

        public function set($var, $val)
        {
            $this->configs[$var] = $val;
        }

        public function __set($var, $val)
        {
            $this->configs[$var] = $val;
        }

        public function __get($var)
        {
            return isset($this->configs[$var])
                   ? $this->configs[$var]
                   : null
            ;
        }

        private function load_from_file($path, $default=null)
        {
            $val = null;
            $path_ex = explode('.',$path);
            $filepath = $this->get_filepath($path_ex[0]);

            if (is_readable($filepath))
            {
                $config = include($filepath);
                if (count($path_ex)==1)
                {
                    $val = $config;
                }
                else
                {
                    array_shift($path_ex);
                    foreach($path_ex as $var)
                    {
                        if (!isset($config[$var]))
                        {
                            $val = $default;
                            break;
                        }
                        $val = $config = $config[$var];
                    }

                }
            }
            return $val;
        }

        private function get_filepath($file)
        {
            return $this->params['base_dir'].$file.'.php';
        }
    }