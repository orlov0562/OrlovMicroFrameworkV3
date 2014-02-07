<?php
    // Объявляем хелперы чтобы сократить текст

    $_m = $this->mi->var_helper->create('html', 'menu');
    $_mi = $this->mi->var_helper->create('html', 'menu_item');
    $_mis = $this->mi->var_helper->create('html', 'menu_item_submenu');
    $_ul = $this->mi->var_helper->create('html', 'ul');
    $_ic = $this->mi->var_helper->create('html', 'icon');

    // Печатаем меню

    echo $_m(array(
            $_mi('','Home', $route_name=='home'),
            $_mis('#',$_ic('icon-cog').' Submenu 1', $_ul(array(
                    $_mi('#',$_ic('icon-envelope-alt').' Sub Item 1'),
                    $_mis('#',$_ic('icon-envelope-alt').' Submenu 1', $_ul(array(
                        $_mi('#',$_ic('icon-coffee').' Sub Sub 1'),
                    ))),
                    $_mi('#',$_ic('icon-trash').' Sub Item 3', FALSE, array('class'=>'divider')),
            )), $route_name=='submenu'),
            $_mi('test','Test', $route_name=='test'),
            $_mi('404','Error 404', $route_name=='err404'),
    ));
