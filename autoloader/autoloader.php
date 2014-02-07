<?php

    $autoloader = function (array $base_dirs)
    {
/*
        $plural = function ($str)
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
        };
*/

        $func = function($class) use ($base_dirs, $plural)
        {

            $class = '/'.str_replace('_', '/', $class);
/*
            $class = preg_replace_callback('~/([a-z0-9]+)/~i', function($matches) use ($plural){
                return '/'.$plural($matches[1]).'/';
            }, $class);
*/
            $class = preg_replace_callback('~/([a-z])~i', function($matches){
                return '/'.ucfirst($matches[1]);
            }, $class);

            foreach ($base_dirs as $dir)
            {
                $inc_path = $dir.$class.'.php';

                if (is_readable($inc_path))
                {
                    include($inc_path);
                    break;
                }
            }

        };

        spl_autoload_register($func);
    };

    $autoloader(array(
        dirname(__DIR__).'/site/classes',
        dirname(__DIR__).'/vendor/mimimi',
    ));



