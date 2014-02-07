<?php

    include dirname(__DIR__).'/vendor/autoloader.php';

    set_exception_handler(function($e){
        die($e->getMessage().'<hr>'.'<pre>'.$e->getTraceAsString().'</pre>');
    });

    header('Content-Type: text/html; charset=utf-8');

    $mi = new mimimi;

    $mi->set_construct_params(array(
        'Config'=>array('base_dir'=>dirname(__DIR__).'/assets/configs/'),
        'View'=>array('base_dir'=>dirname(__DIR__).'/assets/views/'),
    ));

    $mi->app->start();