<?php

    class Request extends Mi
    {
        private $request;

        public function __construct(Mimimi $mi, array $params)
        {
            parent::__construct($mi, $params);
            $this->load_request();
        }

        public function get()
        {
            return $this->request;
        }

        public function __get($var)
        {
            return isset($this->request[$var])
                   ? $this->request[$var]
                   : null;
        }

        private function load_request()
        {
            $this->request = array(
                'uri' => $this->get_request_uri(),
                'ip' => $this->get_user_ip(),
                'method' => $this->get_request_method(),
                'is_cli' => $this->is_cli(),
                'is_ajax' => $this->is_ajax(),
            );
        }

        private function is_cli()
        {
            return php_sapi_name() == 'cli';
        }

        private function get_request_uri()
        {
            $ret = !$this->is_cli()
                 ? $this->get_web_request_uri()
                 : $this->get_cli_request_uri();
            return $ret;
        }

        private function get_web_request_uri()
        {
            $ret = isset($_SERVER['REQUEST_URI'])
                 ? $_SERVER['REQUEST_URI']
                 : '/';

            if ($pos_get = strpos($ret, '?')) $ret = substr($ret, 0, $pos_get);

            return $ret;
        }

        private function get_cli_request_uri()
        {
            $ret = isset($argv[1]) ? $argv[1] : '/';
            return $ret;
        }

        private function get_user_ip()
        {
            if ( getenv('REMOTE_ADDR') ) $user_ip = getenv('REMOTE_ADDR');
            elseif ( getenv('HTTP_FORWARDED_FOR') ) $user_ip = getenv('HTTP_FORWARDED_FOR');
            elseif ( getenv('HTTP_X_FORWARDED_FOR') ) $user_ip = getenv('HTTP_X_FORWARDED_FOR');
            elseif ( getenv('HTTP_X_COMING_FROM') ) $user_ip = getenv('HTTP_X_COMING_FROM');
            elseif ( getenv('HTTP_VIA') ) $user_ip = getenv('HTTP_VIA');
            elseif ( getenv('HTTP_XROXY_CONNECTION') ) $user_ip = getenv('HTTP_XROXY_CONNECTION');
            elseif ( getenv('HTTP_CLIENT_IP') ) $user_ip = getenv('HTTP_CLIENT_IP');
            $user_ip = trim($user_ip);
            if ( empty($user_ip) ) return false;
            if ( !preg_match("/^([1-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(\.([0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])){3}$/", $user_ip) ) return false;
            return $user_ip;
        }

        private function get_request_method()
        {
            return isset($_SERVER['REQUEST_METHOD'])
                   ? $_SERVER['REQUEST_METHOD']
                   : null
            ;
        }

        private function is_ajax()
        {
            return (
                !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
                AND
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
            );
        }

    }