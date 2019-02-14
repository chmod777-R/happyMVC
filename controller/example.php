<?php
helper("typer", 1);

# useModel("example");
function indexAction()
{
    #getSomeData();
    $data = ["msg" => "Just smile", "title" => "happyMVC", "main" => getBaseUrl()];
    getView("example", $data);
}

function tryYourMessage($params) {
    $data = ["msg" => $params['msg'], "title" => "happyMVC"];
    getView("example", $data);
}
