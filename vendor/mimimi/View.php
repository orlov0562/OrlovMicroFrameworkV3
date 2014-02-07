<?php
    class View extends Mi
    {
        private $vars = array();

        protected $params = array(
          'base_dir' => './'
        );

        public function __set($var, $val)
        {
            $this->set($var, $val);
        }

        public function __get($var)
        {
            return isset($this->vars[$var]) ? $this->vars[$var] : null;
        }

        public function set($vars, $val=null)
        {
            if (!is_array($vars)) $vars = array($vars=>$val);

            foreach ($vars as $var=>$val)
            {
                $this->vars[$var] = $val;
            }

            return $this;
        }

        public function bind($vars, &$val=null)
        {
            if (!is_array($vars)) $vars = array($vars=>&$val);

            foreach ($vars as $var=>&$val)
            {
                $this->vars[$var] = &$val;
            }
            return $this;
        }

        public function add($vars, $val=null)
        {
            if (!is_array($vars)) $vars = array($vars=>$val);

            foreach ($vars as $var=>$val)
            {
                if (!isset($this->vars[$var])) $this->vars[$var] = '';
                $this->vars[$var] .= $val;
            }

            return $this;
        }

        public function render($view, $return=FALSE)
        {
            $view_filepath = $this->params['base_dir'].strtolower(trim($view)).'.php';
            if (!is_readable($view_filepath)) throw new Exception('View '.$view.' not found');

            $old_err_reporting_level = error_reporting();
            error_reporting($old_err_reporting_level & ~E_NOTICE);
            ob_start();
            extract($this->vars);
            include $view_filepath;
            $ret = ob_get_clean();
            error_reporting($old_err_reporting_level);
            if (!$return) echo $ret; else return $ret;
        }
    }