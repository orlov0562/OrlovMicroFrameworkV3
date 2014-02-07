<?php
    class Response extends Mi
    {
        protected $headers = array(
            'Content-Type: text/html; charset=utf-8'
        );

        public function reset_headers()
        {
            $headers = array();
            return $this;
        }

        public function add_header($header)
        {
            $this->headers[] = $header;
            return $this;
        }

        public function send_headers()
        {
            foreach ($this->headers as $header)
            {
                header($header);
            }
        }

        public function redirect($url, $isAbsolutePath=FALSE, $http_code=null)
        {
            if (!$isAbsolutePath) $url = $this->mi->url->base($url);
            header('Location:'.$url, TRUE, $http_code);
        }

        public function send($content)
        {
            $this->send_headers();
            echo $content;
        }
    }