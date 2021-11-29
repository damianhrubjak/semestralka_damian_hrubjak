<?php

if (!function_exists("addThreeDots")) {
    function addThreeDots($text, $limit, $commas = '...')
    {
        if (strlen($text) > $limit) {
            return substr($text, 0, $limit) . $commas;
        } else {
            return $text;
        }
    }
}

if (!function_exists('generateRandomString')) {

    /**
     * 
     * @param length $length length of generated string
     * @return string random string with unique_id
     */
    function generateRandomString($length = 10)
    {
        $characters = '123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $uniqueid = str_replace(".", "", uniqid('', true));
        return str_shuffle(strtolower($uniqueid) . $randomString);
    }
}

if (!function_exists('slovakDate')) {
    function slovakDate($date)
    {
        return date("d. m. Y", strtotime($date));
    }
}
if (!function_exists('slovakDateLong')) {
    function slovakDateLong($date)
    {
        return date("d. m. Y H:m:s", strtotime($date));
    }
}
