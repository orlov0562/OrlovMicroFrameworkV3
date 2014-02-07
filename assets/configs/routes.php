<?php
    return array(

        (object) array(
            'regexp'=>$this->mi->route_helper->from_regexp('/'),
            'callback'=>'Home::Index',
            'name'=>'home',
        ),

        (object) array(
            'regexp'=>'~.*~',
            'callback'=>'Error::404',
            'name'=>'err404',
        ),


    );