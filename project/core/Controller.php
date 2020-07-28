<?php

class Controller{

    protected $request;
    public $layout = 'default';
    private $vars = array();
    private $rendered = false;

    function __construct($request=null){

        $this->Session = new Session();
        if ($request){
            $this->request = $request;
            require ROOT.DS.'config'.DS.'hook.php';
        }
    }
    public function render($view){
        if ($this->rendered) {return false;}
        extract($this->vars);
        if (strpos($view,'/') === 0){

            $view = ROOT.DS.'view'.$view.'.php';
        }else{
            $view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
        }
        ob_start();
        require($view);
        $layoutContent = ob_get_clean();
        require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
        $this->rendered = true;
    }

    public function set($key,$value=null){
        if (is_array($key)){
            $this->vars += $key;
        }else{
            $this->vars[$key] = $value;
        }
    }

    public function loadModel($name){
        $file = ROOT.DS.'model'.DS.$name.'.php';
        require_once($file);
        if(!isset($this->$name)){
            $this->$name = new $name;
        }else{
            echo "pas chargé";
        }
    }

    function e404($message){
        header("HTTP/1.0 404 Not Found");
        $this->set('message',$message);
        $this->render('/error/404');
        die();
    }

    /**
     *  Allows to call a controller within a view
     */

     function request($controller,$action){
         $controller .='Controller';
         require_once ROOT.DS.'controller'.DS.$controller.'.php';
         $c = new $controller();
         return $c->$action();
         
     }

}