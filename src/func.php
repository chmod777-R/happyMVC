<?php

# Require helper function
function helper($name, $condation) {
    $filePath = realpath(".").DIRECTORY_SEPARATOR."src".DIRECTORY_SEPARATOR."func".DIRECTORY_SEPARATOR.$name."Helper.php";
    if(file_exists($filePath)) {
        if($condation === 1) {
            require_once($filePath);
        } else {
            echo "$name Helper terminated.";
        }
    } else {
        die("$name Helper not found. <br> Filepath: $filePath");
    }
}
