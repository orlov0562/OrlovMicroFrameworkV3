<?php

    class Route extends Mi
    {

        public function create($params)
        {

            if (is_string($params))
            {
                $regexp = '
                   (?:if)? \s* `([^`]+)` \s*
                   (?:->|then) \s* `([^`]+)` \s*
                   (?: (?:@|as) \s* `([^`]+)`)?
                ';
                if (preg_match('~^'.$regexp.'$~Usix', $params, $regs))
                {
                    $params = array(
                        'regexp' => trim($regs[1]),
                        'callback' => trim($regs[2]),
                        'name' => trim($regs[3]),
                    );
                }
            }

            if (!isset($params['regexp']))
            {
                throw new Exception('Undefined regexp in route');
            }

            if (!isset($params['callback']))
            {
                throw new Exception('Undefined callback in route');
            }

            if (!isset($params['name']))
            {
                $params['name'] = 'default';
            }


            return (object) $params;
        }
        
    }