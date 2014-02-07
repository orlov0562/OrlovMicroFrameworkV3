<?php

    abstract class ControllerTemplate extends Controller
    {
        protected $response;

        protected $view;
        protected $header;
        protected $body;
        protected $footer;

        public function before()
        {
            parent::before();

            $this->response = $this->mi->get('response');

            $this->header = $this->mi->get('view')->template('base/header');
            $this->body = $this->mi->get('view')->template('base/body');
            $this->footer = $this->mi->get('view')->template('base/footer');

            $this->view = $this->mi->get('view')->template('index')
                          ->bind('header', $this->header)
                          ->bind('body', $this->body)
                          ->bind('footer', $this->footer)
            ;
        }

        public function after()
        {
            $this->response->send(
                $this->view->render('base/index')
            );
            parent::after();
        }

    }