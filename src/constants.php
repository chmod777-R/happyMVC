<?php

#
define('DS', DIRECTORY_SEPARATOR);
define('MAIN', realpath("."));
define('ERROR', require_once("errors.php"));
#
# Directorys
define('CONTROLLER_DIR', MAIN.DS."controller");
define('VIEW_DIR', MAIN.DS."view");
define('MODEL_DIR', MAIN.DS."model");
define('VENDOR_DIR', MAIN.DS."vendor");
define('CONFIG_DIR', MAIN.DS."config");
define('PUBLİC_DUR', MAIN.DS."public");
#
#
define('P_CONFIG', require_once(CONFIG_DIR.DS."project.php"));
define('DATABASE', require_once(CONFIG_DIR.DS."database.php"));
