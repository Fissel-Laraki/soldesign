<?php

class Request{

    public $url; // URL called by the user
    public $page = 1;
    public $data = null;

    function __construct(){
        $this->url = $_SERVER['PATH_INFO'];
        $this->full_url = $_SERVER['REQUEST_URI'];


        if (!empty($_GET)){
            $this->data = json_decode(json_encode($_GET),FALSE);

        }
        if(!empty($_POST)){
            $this->data = json_decode(json_encode($_POST),FALSE);
        }


        if(isset($_GET['page'])){
            if(is_numeric($_GET['page']))
            $this->page = round($_GET['page']);
        }
    }
}