<?php

class MainController extends Controller{

    
    function index(){
        $this->loadModel('Category');
        $this->Category->primaryKey = 'cid';

        $categories = $this->Category->find(array());
        $data['categories'] = $categories;
        

        $this->set($data);
        
    }

    function about(){
        
    }

    
    
}