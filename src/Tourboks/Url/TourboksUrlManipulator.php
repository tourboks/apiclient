<?php

namespace Tourboks\Url;

class TourboksUrlManipulator
{
    public static function forceSlashPrefix($string)
    {
        if (!$string) {
            return $string;
        }

        return strpos($string, '/') === 0 ? $string : '/' . $string;
    }
}