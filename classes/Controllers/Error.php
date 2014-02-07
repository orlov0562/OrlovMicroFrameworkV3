<?php

    class Controller_Error extends ControllerPageTemplate
    {
        public function Action_404()
        {
            $this->response->add_header('HTTP/1.0 404 Not Found');
            $this->seo_title = 'Error 404 - '.$this->seo_title;
            $this->body = $this->mi->get('view')->render('errors/404');
        }
    }