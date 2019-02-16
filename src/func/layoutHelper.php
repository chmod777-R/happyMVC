<?php

function runController($controller, $action, $params = null) {
    if(!isset($controller)) die(ERROR[3]);

    $filePath = CONTROLLER_DIR.DS.$controller.".php";
    if(isset($controller)) {
        if(file_exists($filePath)) {
            require_once($filePath);
            if(function_exists($action)) {
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

    $arr = explode("\n", LAYOUT_SET);
    foreach ($arr as $key => $value) {
        preg_match("/\{(.*?)\}/", $value, $layout);
        if($layout != $viewName && file_exists(VIEW_DIR.DS.@@$layout[1].".dwoo")) {
            echo $core->get(VIEW_DIR.DS.$layout[1].".dwoo", $data);
        } elseif(@@$layout[1] == "current") {
            echo $core->get(VIEW_DIR.DS.$viewName.".dwoo", $data);
        }
    }
}

function useModel($modelName) {
    $filePath = MODEL_DIR.DS.$modelName.".php";
    if(file_exists($filePath)) {
        require_once($filePath);
    } else {
        echo ERROR[4]." : ".$filePath;
    }
}
