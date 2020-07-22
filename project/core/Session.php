<?php

class Session{
    
    public function __construct(){
        if (!isset($_SESSION)){
            session_start();
        }
    }

    public function setFlash($message,$type='danger'){
        $_SESSION['flash'] = array(
            'message' => $message,
            'type' => $type
        );
    }

    public function flash(){
        if (isset($_SESSION['flash'])){
            return '<div class="alert alert-'.$_SESSION['flash']['type'].'" role="alert">'.$_SESSION['flash']['message'].'</div>';
        }
    }

    public function set($key,$value){
        $_SESSION[$key] = $value;
    }

    public function get($key){
        
        if (isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return null;
    }

    public function isLogged(){
        return isset($_SESSION['User']);
    }
}