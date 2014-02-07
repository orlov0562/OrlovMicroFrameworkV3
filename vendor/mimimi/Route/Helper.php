<?php

    class Route_Helper extends Mi
    {
        public function from_regexp($regexp, $template='~^{@regexp}$~i')
        {
            return str_replace('{@regexp}', $regexp, $template);
        }
    }