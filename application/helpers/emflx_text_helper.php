<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('emflx_trim_description'))
{
    function emflx_trim_description($text, $escape = true)
    {
        $trimed_text = substr($text, 0, 100);

        // Add ... if actually trimmed
        if (strlen($trimed_text) < strlen($text)) {
            $trimed_text .= '...';
        }

        if ($escape) {
            $trimed_text = htmlentities($trimed_text);
        }
        return $trimed_text;
    }   
}
