<?php

function debug($var){

    if(Conf::$debug>0){

        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

}

function redirect($url){
    header('Location: '.$url);
}


function diverse_array($vector) {
    $result = array();
    foreach($vector as $key1 => $value1)
        foreach($value1 as $key2 => $value2)
            $result[$key2][$key1] = $value2;
    return $result;
}

