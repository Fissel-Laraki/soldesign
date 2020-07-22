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