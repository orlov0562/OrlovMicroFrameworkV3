<?php
    class Url extends Mi
    {
        public function absolute($path)
        {
            $domain   = $_SERVER['HTTP_HOST'];
            $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https')=== FALSE
                      ? 'http'
                      : 'https'
            ;
            $ret = $protocol . '://' . $domain . $path;

            return $ret;
        }
    }