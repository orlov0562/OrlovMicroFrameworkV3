<?php

    set_exception_handler(function($e){
        die($e->getMessage().'<hr>'.'<pre>'.$e->getTraceAsString().'</pre>');
    });
