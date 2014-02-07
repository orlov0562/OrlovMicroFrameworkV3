<?php

    abstract class Mi
    {
        protected $mi;
        protected $params;

        public function __construct(Mimimi $mi, array $params)
        {
            $this->mi = $mi;
            $this->params = $params;
        }
    }