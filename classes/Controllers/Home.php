<?php

    class Controller_Home extends Controller
    {
        public function Action_Index()
        {
            $this->mi->get('view')
            ->set('content', $this->mi->get('view')->render('home', TRUE))
            ->set('menu', $this->mi->get('view')->render('menu', TRUE))
            ->render('index');
        }
    }