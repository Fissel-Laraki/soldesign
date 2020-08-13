<?php

class UserController extends Controller{

    private $minPass = 10; 
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
            }else{
                $errors[] = "Votre login ou votre mot de passe sont incorrects";
            }

            $datas['errors'] = $errors;
            $this->set($datas);


        }
        if ($this->Session->isLogged()){
            if ($this->Session->isAdmin()){
                redirect(BASE_URL.DS.'admin'.DS.'articles');
            }else{
                redirect(BASE_URL.DS.'product'.DS);
            }
        }
                
        
        
    }

    function signin(){
    /**
     * If the visitor tries to signin
     */
    if ($this->request->data){
        $data =$this->request->data;
     
        if ($data->password != $data->password2){
            $errors[] = "Vos mots de passe ne correspondent pas.";
        }
        if (strlen($data->password) < $this->minPass ){
            $errors[] = "Veuillez entrer un mot de passe d'une longueur minimale de $this->minPass";
        }
        if (!filter_var($data->email, FILTER_VALIDATE_EMAIL)){
            $errors[] = "L'adresse mail saisie est incorrecte";
        }
        
        if(empty($errors)){
            // Save the user
            $this->loadModel('User');
            $this->User->primaryKey = 'uid';
            $data->password = sha1($data->password);
            unset($data->password2);
            unset($data->submit);
            $this->User->insert($data);
        }else{

            $datas['errors'] = $errors;
            $this->set($datas);
        }

    }
    
            
    
        
    }

    function orders(){
        if ($this->Session->isLogged()){
            $this->loadModel('Orders');
            $orders = $this->Orders->find(array(
                'conditions' => array('uid' => $this->Session->get('User')->uid)
            ));
            $data['orders'] = $orders;
            $this->set($data);
        }else{
            $this->e404("Page indisponible");
        }

    }

    function account(){

    }

    function logout(){
        unset($_SESSION['User']);
        redirect(BASE_URL.DS.'product'.DS);
    }

    function orderDetail($oid){
        if($this->Session->isLogged()){
            $this->loadModel("Lnk_orders_product");
            $products = $this->Lnk_orders_product->getProductsOfOrder($oid);
            echo json_encode($products);
            die();
        }else{
            $this->e404("Page indisponible");
        }
    }
    
    
}