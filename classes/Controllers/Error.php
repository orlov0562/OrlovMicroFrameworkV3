<?php

    class Controller_Error extends Controller
    {
        public function Action_404()
        {
            $this->mi->get('view')
            ->set('content', $this->mi->get('view')->render('err/404', TRUE))
            ->set('menu', $this->mi->get('view')->render('menu', TRUE))
            ->render('index');
        }
    }