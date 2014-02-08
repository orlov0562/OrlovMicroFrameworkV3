<?php
    class Path extends Mi
    {
        protected $params = array(
            'base_dir' => './'
        );

        public function base($path='')
        {
            $ret =  $this->params['base_dir']
                    .$path;

            return $ret;
        }
    }