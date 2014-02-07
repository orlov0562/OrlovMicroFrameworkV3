<?php

    class Controller_Error extends Controller_Base_Page_Template
    {
        public function Action_404()
        {
            $this->response->add_header('HTTP/1.0 404 Not Found');
            $this->seo_title = 'Error 404 - '.$this->seo_title;
            $this->body = $this->mi->get('view')->render('errors/404');
        }

        public function Action_503()
        {
            $this->response->add_header('HTTP/1.1 503 Service Temporarily Unavailable');
            $this->seo_title = 'Error 503 - '.$this->seo_title;
            $this->body = $this->mi->get('view')->render('errors/503');
        }

    }