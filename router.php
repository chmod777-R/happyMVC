<?php
if (file_exists($_SERVER['SCRIPT_FILENAME'])) {
    return false;
}
$_SERVER['DOCUMENT_ROOT'] = empty($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['PWD'] . '/www' : $_SERVER['DOCUMENT_ROOT'];
$htaccess = $_SERVER['DOCUMENT_ROOT'] . '/.htaccess';
$rewrites = array();
if (file_exists($htaccess)) {
    $fp = fopen($htaccess, "r");
    while ($line = fgets($fp)) {
        if (preg_match('/RewriteRule\s+(?P<expr>[^\s]+)\s+(?P<file>[^\s]+)/', $line, $matches)) {
            $rewrites[] = array('/' . str_replace('/', '\/', $matches['expr']) . '/', $matches['file']);
        }
    }
    fclose($fp);
} else {
    error_log("No .htaccess file found in documnet root " + $_SERVER['DOCUMENT_ROOT']);
}
$rewriteUri  = substr($_SERVER["SCRIPT_NAME"], 1, strlen($_SERVER["SCRIPT_NAME"]) - 1);
$match = false;
array_walk($rewrites, function ($rewrite) use (&$match, $rewriteUri) {
    if (preg_match($rewrite[0], $rewriteUri)) {
        $match = true;
        require_once($_SERVER['DOCUMENT_ROOT'] . '/' . $rewrite[1]);
    }
});
return $match;
