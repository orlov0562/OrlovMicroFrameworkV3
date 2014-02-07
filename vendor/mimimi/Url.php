<?php
    class Url extends Mi
    {
        public function base($path='')
        {
            $ret =  $this->mi->config->get('app.basepath')
                    .$path;

            return $ret;
        }

        public function absolute($path='')
        {
            $domain   = $_SERVER['HTTP_HOST'];
            $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https')=== FALSE
                      ? 'http'
                      : 'https'
            ;
            $ret = $protocol.'://'.$domain
                   .$this->base($path);

            return $ret;
        }
    }