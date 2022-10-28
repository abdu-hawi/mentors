<?php

function url(){
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $url = "https://";
    else
        $url = "http://";

    $l = explode('/', $_SERVER['REQUEST_URI']);
    $path = '';
    foreach ($l as $k=>$ll){
        if (!str_ends_with($ll, '.php' ) && !empty($ll)){
            $path.= '/'.$ll;
        }
    }
    return ['url' => $url, 'path' => $path];
}