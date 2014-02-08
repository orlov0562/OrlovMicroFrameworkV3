<?php

    class System extends Mi
    {
        public function show_php_errors()
        {
            error_reporting(-1);
            ini_set('display_errors', TRUE);
            ini_set('display_startup_errors', TRUE);
        }
    }