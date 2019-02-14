<?php

# Require constants
require_once("src".DIRECTORY_SEPARATOR."constants.php");
# Require functions
require_once("src".DS."func.php");
# Require composer autoloader
require_once VENDOR_DIR.DS.'autoload.php';
# Require request helpers
helper("request", 1);
# Lern request | Alternative routing
#$controller     = solveRequest()['controller'];
#$params         = solveRequest()['params'];
#$action         = solveRequest()['action'];
# Require layout helpers
helper("layout", 1);
# Require routes
require_once(CONFIG_DIR.DS."routes.php");
