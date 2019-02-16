<?php

function runController($controller, $action, $params = null) {
    if(!isset($controller)) die(ERROR[3]);

    $filePath = CONTROLLER_DIR.DS.$controller.".php";
    if(isset($controller)) {
        if(file_exists($filePath)) {
            @@require_once($filePath);
            if(@@function_exists($action)) {
                # Sayfamızı çalıştırıyoruz
                $action($params);
                die("<!--happy-->");
            } else {
                echo ERROR[1]." : ".$action;
            }
        }
    }
}

function getView($viewName, $data) {
    # We using amazing template engine dwoo
    $core = new Dwoo\Core();
    echo $core->get(VIEW_DIR.DS.$viewName.".dwoo", $data);
}

function useModel($modelName) {
    $filePath = MODEL_DIR.DS.$modelName.".php";
    if(file_exists($filePath)) {
        require_once($filePath);
    } else {
        echo ERROR[4]." : ".$filePath;
    }
}
