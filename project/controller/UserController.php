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
            if ($this->Session->isAdmin()){
                redirect(BASE_URL.DS.'admin'.DS.'articles');
            }else{
                redirect(BASE_URL.DS.'product'.DS);
            }
        }
                
        
        
    }

    function logout(){
        unset($_SESSION['User']);
        redirect(BASE_URL.DS.'product'.DS);
    }

    
    
}