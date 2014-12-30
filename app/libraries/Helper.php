<?php

class Helper {

    /**
     * Take datetime input and convert it into 'time ago' format
     *
     * @param        $datetime
     * @param string $type The type of the entity
     *
     * @return string          The datetime in 'time ago' format
     */
    public static function timeAgo($datetime, $type = 'post')
    {
        $now    = new DateTime;
        $ago    = new DateTime($datetime);
        $diff   = $now->diff($ago);
        $result = '';

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = [
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        ];
        foreach ($string as $k => &$v)
        {
            if ($diff->$k)
            {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            }
            else
            {
                unset($string[$k]);
            }
        }

        $string = array_slice($string, 0, 1);
        if ($type === 'post')
        {
            $result = $string ? implode(', ', $string) . ' ago' : 'just now';
        }
        else if ($type === 'user')
        {
            $result = $string ? implode(', ', $string) . '' : 'a nanosecond';
        }

        return $result;
    }
}
