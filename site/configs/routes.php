<?php
    return array(

        $this->mi->route->create(array(
            'regexp'=>$this->mi->route_helper->from_regexp('/'),
            'callback'=>'Home::Index',
            'name'=>'home',
        )),

        $this->mi->route->create('`~/test~` -> `Test` @ `test`'),

        $this->mi->route->create('IF `~.?~` THEN `Error::404` AS `err404`'),
    );