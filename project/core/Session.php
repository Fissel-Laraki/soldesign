<?php

class Session{
    
    public function __construct(){
        if (!isset($_SESSION)){
            session_start();
        }
    }

    public function destroy(){
        if(isset($_SESSION)){
            session_destroy();
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

    
    public function isAdmin(){
        
        if (isset($_SESSION['User'])){
            return $_SESSION['User']->level == 2;
        }
        return false;
    }

    public function addCart($id,$price,$name){
        if (isset($_SESSION['Cart'][$id])){
            $_SESSION['Cart'][$id]['quantity'] +=  1;
        }else{
            $_SESSION['Cart'][$id] = array(
                'name' => $name,
                'quantity' => 1,
                'price' => $price
            );
        }
    }
}