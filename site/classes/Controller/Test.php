<?php

    class Controller_Test extends Controller_Base_Page_Template
    {
        public function Action_Index()
        {
            $this->mi->controller_callback->execute('Error::503')->stop();
        }
    }