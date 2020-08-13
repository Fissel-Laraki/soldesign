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
        $_SESSION['Flash'] = array(
            'message' => $message,
            'type' => $type
        );
    }

    public function flash(){
        if (isset($_SESSION['Flash'])){
            $res = '<div class="alert alert-'.$_SESSION['Flash']['type'].'" role="alert">'.$_SESSION['Flash']['message'].'</div>';
            unset($_SESSION['Flash']);
            return $res;
        }
    }

    public function set($key,$value){
        $_SESSION[$key] = $value;
    }

    public function unset($key){
        unset($_SESSION[$key]);
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

    public function addCart($id,$product){
        $product->price = $product->price*(1-($product->promotion/100));
        if (isset($_SESSION['Cart'][$id])){
            $_SESSION['Cart'][$id]['quantity'] +=  1;
        }else{
            $_SESSION['Cart'][$id] = array(
                'product' => $product,
                'quantity' => 1
            );
        }
    }

    public function deleteCart($id){
        unset($_SESSION['Cart'][$id]);
    }

    public function emptyCart(){
        unset($_SESSION['Cart']);
    }

    public function updateCart($id,$quantity){
        $_SESSION['Cart'][$id]['quantity'] = $quantity;
    }

    public function getTotal(){
        $total = 0;
        if (!isset($_SESSION['Cart'])) return $total;
        foreach($_SESSION['Cart'] as $item) {
            $total = $total + $item['quantity'];
        }
        return $total;
    }

    public function getTotalPrice(){
        $total = 0.0;
        if (!isset($_SESSION['Cart'])) return $total;
        foreach($_SESSION['Cart'] as $item) {
            $total = $total + $item['product']->price * $item['quantity'];
        }
        return $total;
    }
}