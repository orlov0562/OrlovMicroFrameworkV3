<?php

    class Controller_Home extends ControllerPageTemplate
    {
        public function Action_Index()
        {
            $this->seo_title = 'Home - '.$this->seo_title;
            $this->body = $this->mi->get('view')->render('home');
        }
    }