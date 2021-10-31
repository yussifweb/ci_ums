<?php
defined('BASEPATH') or exit('No direct script access allowed');

function dd($data){
    echo '<pre>'.print_r($data, TRUE).'</pre>';
}

function fullname($fname, $mname = '', $lname = '', $xname = ''){
    $mn = '';
    if (!empty($mname)) {
        $mn = $mname[0] . '.';
    }

    $name = $fname . ' ' . $mn . ' ' . $lname;

    if (!empty($xname)) {
        $name .= ', ' . $xname;
    }

    return $name;
    
}