<?php

class Dispatcher {

    private $request;
    
    function __construct(){
        $this->request = new Request();
        Router::parse($this->request->url,$this->request);
        $controller = $this->loadController();
        if(!in_array($this->request->action,array_diff(get_class_methods($controller),get_class_methods('Controller')))){
            $this->error('The controller '.$this->request->controller.' does not have the method '.$this->request->action);
        }
        call_user_func_array(array($controller,$this->request->action),$this->request->params);
        $controller->render($this->request->action);
    }

    function error($message){
        header("HTTP/1.0 404 Not Found");
        $controller = new Controller($this->request);
        $controller->Session = new Session();
        $controller->set('message',$message);
        $controller->render('/error/404');
        die();
    }

    function loadController(){
        $name = ucfirst($this->request->controller).'Controller';
        $file = ROOT.DS.'controller'.DS.$name.'.php';
        require $file;
        $controller = new $name($this->request);

        $controller->Session = new Session();

        return $controller;
    }
}