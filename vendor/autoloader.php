<?php

    function plural($str)
    {
        $regexes = array(
            '/^(.*?[sxz])$/i' => '\\1es',
            '/^(.*?[^aeioudgkprt]h)$/i' => '\\1es',
            '/^(.*?[^aeiou])y$/i' => '\\1ies',
        );
        foreach ($regexes as $key => $val)
        {
            $str = preg_replace($key, $val, $str, -1, $count);
            if ($count)
            {
                return $str;
            }
        }
        return $str.'s';
    }


    spl_autoload_register(function($class){

        $class = '/'.str_replace('_', '/', $class);

        $class = preg_replace_callback('~/([a-z0-9]+)/~i', function($matches){
            return '/'.plural($matches[1]).'/';
        }, $class);

        $class = preg_replace_callback('~/([a-z])~i', function($matches){
            return '/'.ucfirst($matches[1]);
        }, $class);

        $classdirs = array(
            dirname(__DIR__).'/vendor/mimimi',
            dirname(__DIR__).'/classes',
        );

        foreach ($classdirs as $dir)
        {
            if (is_readable($dir.$class.'.php'))
            {
                include($dir.$class.'.php');
                break;
            }
        }

    });