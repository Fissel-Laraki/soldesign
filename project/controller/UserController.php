<?php

class UserController extends Controller{

    private $minPass = 10; 
    function index(){


    }

    function login(){
        /**
         * If the visitor tries to connect
         */
        $email = "";
        $datas['email'] = $email;
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
                $email = $data->email;
                $errors[] = "Votre login ou votre mot de passe sont incorrects";
            }
            $datas['email'] = $email;
            $datas['errors'] = $errors;


        }
        if ($this->Session->isLogged()){
            if ($this->Session->isAdmin()){
                redirect(BASE_URL.DS.'admin'.DS.'articles');
            }else{
                redirect(BASE_URL.DS.'product'.DS);
            }
        }
        $this->set($datas);
                
        
        
    }

    function signin(){
    /**
     * If the visitor tries to signin
     */
    $keys = array(
        'email',
        'name',
        'firstname',
        'street',
        'code',
        'city',
        'country',
        'phone'
    );
    if ($this->request->data){
        $this->loadModel('User');
        $this->User->primaryKey = 'uid';

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
        if ($this->User->findFirst(array('conditions' => array('email' => $data->email)))){
            $errors[] ="Ce compte existe deja";
        }
        
        if(empty($errors)){
            // Save the user
            $this->loadModel('Adress');
            $data2 =  (object) array(
                'street' => $data->street,
                'city' => $data->city,
                'country' => $data->country,
                'code' => $data->code
            );
            unset($data->street);
            unset($data->code);
            unset($data->country);
            unset($data->city);
            unset($data->password2);
            unset($data->submit);

            $data->password = sha1($data->password);
            $this->Adress->db->beginTransaction();
            $this->Adress->insert($data2);
            $adid = $this->Adress->getLastId();
            $data->adid = $adid;
            $this->User->insert($data);
            $res = $this->Adress->db->commit();
            if($res){
                $this->Session->setFlash("Vous pouvez vous connecter!","success");
                redirect(BASE_URL.DS.'user'.DS.'login');
            }
        }else{



            foreach($keys as $key){
                if(!isset($data->$key)){
                    $data->$key = "";
                }
            }
            $datas['data'] = $data;
            $datas['errors'] = $errors;
            $this->set($datas);
        }

    }else{
        $data = (object)[];
        foreach($keys as $key){
            $data->$key = "";
        }
        $datas['data'] = $data;
        $this->set($datas);
    
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
        $this->loadModel('User');
        $this->loadModel('Adress');

        $user = $this->User->findFirst(array(
            'conditions' => array('uid' => $this->Session->get('User')->uid)
        ));

        $adress = $this->Adress->findFirst(array(
            'conditions' => array('adid' => $user->adid)
        ));

        $data['user'] = $user;
        $data['adress'] = $adress;
        $this->set($data);

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
        
    function update(){
        $this->loadModel('User');
        $this->loadModel('Adress');
        $user = $this->User->findFirst(array(
            'conditions' => array('uid' => $this->Session->get('User')->uid)
        ));
        $adid = $user->adid;
        $userData = (object) [];
        $userData->phone = $_POST['phone'];
        $adressData = (object) $_POST;
        unset($adressData->phone);
        if (isset($_POST['currentpass']) && isset($_POST['newpass']) && isset($_POST['newpass2'])){
            unset($adressData->currentpass);
            unset($adressData->newpass);
            unset($adressData->newpass2);

            if ($_POST['newpass'] == $_POST['newpass2']){
                if(sha1($_POST['currentpass']) == $user->password){
                    $userData->password = sha1($_POST['newpass']);
                }      
            }
        }
        $this->User->db->beginTransaction();
        $this->User->update((array)$userData," uid = ".$user->uid); 
        $this->Adress->update((array)$adressData," adid = ".$adid);
        $this->User->db->commit();
        die();  
    }
    
}