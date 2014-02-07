<?php

    abstract class ControllerPageTemplate extends ControllerTemplate
    {
        protected $seo_title;
        protected $seo_description;
        protected $seo_keywords;
        protected $seo_robots;
        protected $menu;

        public function before()
        {
            parent::before();

            $this->seo_title = $this->mi->config->get('seo.default.title');
            $this->seo_description = $this->mi->config->get('seo.default.description');
            $this->seo_keywords = $this->mi->config->get('seo.default.keywords');
            $this->seo_robots = $this->mi->config->get('seo.default.robots');

            $this->header->bind('seo_title', $this->seo_title)
                         ->bind('seo_description', $this->seo_description)
                         ->bind('menu', $this->menu)
            ;

            $this->menu = $this->mi->get('view')->template('base/menu')
                          ->bind('route_name', $this->mi->registry->route->name)
            ;
        }
    }