<?php

    class Html extends Mi
    {
        public function anchor($url, $text, array $attr=array())
        {
            if (!preg_match('~^(#|http)~',$url)) $url = $this->mi->url->base($url);
            return '<a href="'.$url.'"'.$this->attr_str($attr).'>'.$text.'</a>';
        }

        public function ul(array $items, array $attr=array())
        {
            $ret = '<ul'.$this->attr_str($attr).'>';
            foreach ($items as $item)
            {
                $text = is_string($item) ? $item : isset($item['text']) ? $item['text'] : '';
                $attr = (isset($item['attr']) AND is_array($item['attr'])) ? $item['attr'] : array();
                $ret.=$this->li($text , $attr);
            }
            $ret.='</ul>';

            return $ret;
        }

        public function li($text, array $attr=array())
        {
            return '<li'.$this->attr_str($attr).'>'.$text.'</li>';
        }

        public function icon($icon)
        {
            return '<i class="'.$icon.'"></i>';
        }


        private function attr_str(array $attr)
        {
            array_walk($attr, create_function('&$i,$k','$i=" $k=\"$i\"";'));
            return implode($attr);
        }

        public function menu(array $items, array $attr=array())
        {
            $attr['class'] = isset($attr['class'])
                              ? $attr['class'].' menu'
                              : 'menu'
            ;

            return $this->ul($items, $attr);
        }


        public function menu_item($url, $text, $current=FALSE, array $li_attr=array(), array $anchor_attr=array())
        {
            if ($current)
            {
                $li_attr['class'] = isset($li_attr['class'])
                                  ? $li_attr['class'].' current'
                                  : 'current'
                ;
            }
            return array (
                'text'=>$this->anchor($url, $text, $anchor_attr),
                'attr'=>$li_attr,
            );
        }

        public function menu_item_submenu($url, $text, $submenu, $current=FALSE, array $li_attr=array(), array $anchor_attr=array())
        {
            if ($current)
            {
                $li_attr['class'] = isset($li_attr['class'])
                                  ? $li_attr['class'].' current'
                                  : 'current'
                ;
            }
            return array (
                'text'=>$this->anchor($url, $text, $anchor_attr)
                        .$submenu,
                'attr'=>$li_attr,
            );
        }


    }