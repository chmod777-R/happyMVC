<?php

#
define('DS', DIRECTORY_SEPARATOR);
define('MAIN', realpath("."));
define('ERROR', require_once("errors.php"));
define('BASE', sys_happy_url());
#
# Directorys
define('CONTROLLER_DIR', MAIN.DS."controller");
define('VIEW_DIR', MAIN.DS."view");
define('MODEL_DIR', MAIN.DS."model");
define('VENDOR_DIR', MAIN.DS."vendor");
define('CONFIG_DIR', MAIN.DS."config");
define('PUBLİC_DIR', MAIN.DS."public");
define('LIBRARY_DIR', MAIN.DS."library");
#
#
define('P_CONFIG', require_once(CONFIG_DIR.DS."project.php"));
define('DATABASE', require_once(CONFIG_DIR.DS."database.php"));


function sys_happy_url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}
