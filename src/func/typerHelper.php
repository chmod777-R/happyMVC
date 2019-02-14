<?php
function slug($str, $replace=array(), $delimiter='-') {
    if ( !empty($replace) ) {
        $str = str_replace((array)$replace, ' ', $str);
	}
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	return $clean;
}

function getBaseUrl()
{
    return pathinfo($_SERVER["PHP_SELF"])["dirname"].'/';

}
