<?php

class UserController extends Controller{

    
    function index(){


    }

    function login(){
        /**
         * If the visitor tries to connect
         */
        if ($this->request->data){
            $data =$this->request->data;
            $data->password = sha1($data->password);
            $this->loadModel('User');
            $user = $this->User->findFirst(array(
                'conditions' => array('email' => $data->email,'password'=>$data->password)
            ));

            if (!empty($user)){
                $this->Session->set('User',$user);
            }


        }
        if ($this->Session->isLogged()){
            redirect(BASE_URL.DS.'product'.DS);
        }
                
        
        
    }

    
    
}