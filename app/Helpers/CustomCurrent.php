<?php

if (!function_exists('formatCurrent')) {
    function formatCurrent(string $value)
    {
       return number_format(
            str_replace(",", ".", str_replace(".", "", $value)),
            2,
            '.',
            ''
        );
    }
}
