<?php
/*
* setRoute function
* It is used to give routers route. It does not have to be used. If no route is given, solveRequest is activated.
*/
function setRoute($uri, $callback) {
    $request = @@$_GET['url'];
    preg_match("/\{(.*?)\}/", $uri, $params);

    $newWithoutParams = null;
    foreach ($params as $key => $value) {
        $getParam = explode('/', $uri);
        foreach ($getParam as $key => $value) {
            if(strstr($value, '{') && strstr($value, '}')) {
                $url                  = explode('/', $request);
                $value                = str_replace('{', null, $value);
                $value                = str_replace('}', null, $value);
                @@$realParams[$value] = $url[$key];
                $newUri               = str_replace("{".$value."}", @@$url[$key], $uri);
                $newWithoutParams     = str_replace("{".$value."}", null, $uri);
            }
        }
        $uri             = $newUri;
        unset($getParam);
        unset($url);
    }

    if(@@$request == $uri || @@$request == $uri.'/' || @@$request == $newWithoutParams || @@$request.'/' == $newWithoutParams ) {
        if(is_string($callback)) {
            $callback = explode('@', $callback);
            runController($callback[0], $callback[1], @@$realParams);
        } else {
            call_user_func($callback, $realParams);
        }
    }
}

/*
* Solve request function. this function acts as a primitive route.
*/
function solveRequest() {
    $request        = @@$_GET["url"]; # Linkten aldığımız istek
    $request        = explode('/',$request);
    $controller     = (@@$request[0]==null)? "home" : $request[0];
    $action         = (@@$request[1]==null)? "indexAction" : $request[1];
    array_shift($request);
    array_shift($request);
    $params         = $request;
    return [
        'controller' => $controller,
        'action'     => $action,
        'params'     => $params

    ];
}
