<?php


$time_start = microtime(true);


    include dirname(__DIR__).'/autoloader/autoloader.php';
    include dirname(__DIR__).'/site/handlers.php';

    $mi = new mimimi;

    $mi->set_construct_params(array(
        'Config'=>array('base_dir'=>dirname(__DIR__).'/site/configs/'),
        'View'=>array('base_dir'=>dirname(__DIR__).'/site/views/'),
    ));

    $mi->app->start();


echo '<!-- Время генерации страницы '.(microtime(true) - $time_start).' секунд -->';