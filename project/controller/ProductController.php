
<?php

class ProductController extends Controller{

    
    function index(){
        if (!$this->Session->isAdmin()){

            $perPage = 20;
            $this->loadModel('Product');
            $this->loadModel('Category');
            $this->loadModel('Serie');
            $this->loadModel('Format');

            $this->Product->primaryKey = 'pid';
            $conditions = array();
            
            $categories = $this->Category->find(array(
                'conditions' => " name != 'Toutes'"
            ));
            $series = $this->Serie->find(array(
                'conditions' => " name != 'Toutes'"
            ));
            $formats = $this->Format->find(array(
                'conditions' => " name != 'Tous'"
            ));


            if ($this->request->data){
               
                if (!empty($this->request->data->categories) ){
                    
                    $currentCategories = array_keys(get_object_vars($this->request->data->categories));
                    $conditions[] = "cid in " . "(". implode(",",$currentCategories).")";
                    foreach($categories as $category ){
                        if(in_array($category->cid,$currentCategories) ){
                            $category->checked = true;
                        }
                    }
                }

                if (!empty($this->request->data->series)){
                    
                    $currentSeries = array_keys(get_object_vars($this->request->data->series));
                    $conditions[] = " sid in " . "(". implode(",",$currentSeries).")";
                    foreach($series as $serie){
                        if(in_array($serie->sid,$currentSeries) ){
                            $serie->checked = true;
                        }
                    }
                }

                if (!empty($this->request->data->formats)){
                    
                    $currentFormats = array_keys(get_object_vars($this->request->data->formats));
                    $conditions[] = " format in " . "('". implode("','",$currentFormats)."')";
                    foreach($formats as $format){
                        if(in_array($format->name,$currentFormats) ){
                            $format->checked = true;
                        }
                    }
                }
                if(!empty($this->request->data->sale)){
                    $conditions[] = " promotion > 0 ";
                    $data['saleChecked'] = true;

                }

                if(!empty($this->request->data->name)){
                    $conditions[] = " name like '".$this->request->data->name."%'";
                    $data["name"] = $this->request->data->name;
                }

                if(!empty($this->request->data->min) || !empty($this->request->data->max)){
                    $conditions[] = " (price*(1-promotion/100)) BETWEEN ". $this->request->data->min ." AND " . $this->request->data->max;
                    $data['minPrice'] = $this->request->data->min;
                    $data['maxPrice'] = $this->request->data->max;
                }
            }
            $conditions[] = " available = true ";
            $conditions[] = " deleted = false ";
            $conditions[] = "tid = 3";
            $conditions = implode(' AND ',$conditions);
            $products = $this->Product->find(array(
                'conditions' => $conditions,
                'limit' => ($perPage*($this->request->page-1)).','.$perPage
            ));

            $data['total'] = $this->Product->findCount($conditions);
            $data['page'] = ceil($data['total']/$perPage);
            $data['formats'] = $formats;
            $data['categories'] = $categories;
            $data['series'] = $series;
            $data['products'] = $products;
            

            
            
            $this->set($data);
        }else{
            redirect(BASE_URL.DS.'admin'.DS.'articles');
        }
    }

    function products(){
        if (!$this->Session->isAdmin()){

            $perPage = 20;
            $this->loadModel('Product');
            $this->loadModel('Type');
            $this->loadModel('Accessory');
            $this->loadModel('Consumable');

            $this->Product->primaryKey = 'pid';
            $conditions = array();
            
            $accessories = $this->Accessory->find(array());
            $consumables = $this->Consumable->find(array());

            if ($this->request->data){
               
                if(!empty($this->request->data->sale)){
                    $conditions[] = " promotion > 0 ";
                    $data['saleChecked'] = true;

                }

                if(!empty($this->request->data->name)){
                    $conditions[] = " name like '".$this->request->data->name."%'";
                    $data["name"] = $this->request->data->name;
                }

                if (!empty($this->request->data->accessories)){
                    
                    $currentAccessories = array_keys(get_object_vars($this->request->data->accessories));
                    $conditions[] = " acid in " . "(". implode(",",$currentAccessories).")";
                    foreach($accessories as $accessory){
                        if(in_array($accessory->acid,$currentAccessories) ){
                            $accessory->checked = true;
                        }
                    }
                }
                if (!empty($this->request->data->consumables)){
                    
                    $currentConsumables = array_keys(get_object_vars($this->request->data->consumables));
                    $conditions[] = " coid in " . "(". implode(",",$currentConsumables).")";
                    foreach($consumables as $consumable){
                        if(in_array($consumable->coid,$currentConsumables) ){
                            $consumable->checked = true;
                        }
                    }
                }
                if(!empty($this->request->data->type) && $this->request->data->type != 0){
                   
                    $conditions[] = " tid = ".$this->request->data->type;
                    $data['type'] = $this->Type->findFirst(array(
                        'conditions' => array("tid" => $this->request->data->type)
                    ))->name;
                }

            }
            $conditions[] = " available = true ";
            $conditions[] = " deleted = false ";
            $conditions[] = "tid != 3";
            $conditions = implode(' AND ',$conditions);
            $products = $this->Product->find(array(
                'conditions' => $conditions,
                'limit' => ($perPage*($this->request->page-1)).','.$perPage
            ));
            $types = $this->Type->find(array(
                'conditions' => "name != 'tile'"
            ));


            $data['types'] = $types;
            $data['total'] = $this->Product->findCount($conditions);
            $data['page'] = ceil($data['total']/$perPage);
            $data['products'] = $products;
            $data['accessories'] = $accessories;
            $data['consumables'] = $consumables;

            

            
            
            $this->set($data);
        }else{
            redirect(BASE_URL.DS.'admin'.DS.'articles');
        }
    }

    function article($id){
        if (!$this->Session->isAdmin()){

            $this->loadModel('Media');
            $this->loadModel('Product');
            $this->loadModel('Category');
            $this->loadModel('Serie');
            $this->loadModel('Accessory');
            $this->loadModel('Consumable');
            $this->loadModel('Lnk_product_characteristic');
            $this->loadModel('Type');


            $this->Product->primaryKey = 'pid';
            $this->Media->primaryKey = 'mid';


            $typestmp = $this->Type->find(array());
            $types = array();
            
            foreach($typestmp as $tmp){
                $types[$tmp->name] = $tmp->tid;
            }
            
            $data['product'] = $this->Product->findFirst(array(
            'conditions' => array('pid'=>$id) 
            ));
            $productDetails = array();
            if($data['product']->tid == $types['tile']){
                $productDetails[] = (object)array(
                    "key" => "Serie",
                    "value" => $this->Serie->findFirst(array(
                                'conditions' => array('sid'=> $data['product']->sid)
                                ))->name
                    );

                $productDetails[] = (object)array(
                    'key' => "Destination",
                    "value" => $this->Category->findFirst(array(
                    'conditions' => array('cid'=> $data['product']->cid)
                ))->name
                    );
                
            }else if ($data['product']->tid == $types['accessory']){
                $productDetails[] = (object) array(
                    'key' => "Type d'accessoire",
                    'value' => $this->Accessory->findFirst(array(
                    'conditions' => array('acid' => $data['product']->acid)
                ))->name
                );
            }else{
                $productDetails[] = (object)array(
                    'key' => "Type de consommable",
                    'value' => $this->Consumable->findFirst(array(
                                    'conditions' => array('coid' => $data['product']->coid)
                                ))->name
                );
            }
            $data['productDetails'] = $productDetails;
            $data['images'] = $this->Media->find(array(
                'conditions' => array('aid' => $id)
            ));

            $data['characteristics'] = $this->Lnk_product_characteristic->findCharacteristics($id);

            $this->set($data);

        }else{
            redirect(BASE_URL.DS.'admin'.DS);
        }
    }

    function cart(){
        if ($this->Session->getTotalPrice() == 0){
            $this->Session->setFlash("Veuillez ajouter au moins un article","warning");
            $this->set('empty',true);
        }else{
            $this->set('empty',false);
        }
        
    }

    function addCart($id,$quantity=NULL){
        $this->loadModel('Product');
        $product = $this->Product->findFirst(array(
            'conditions' => array('pid' => $id)
        ));
        if (isset($quantity)){
            $this->Session->addCart($id,$product,$quantity);
        }else{
            $this->Session->addCart($id,$product);
        }
        echo json_decode($this->Session->getTotal());
        die();
    }

    function deleteCart($id){
        $this->Session->deleteCart($id);
        redirect(BASE_URL.DS.'product'.DS.'cart');
        
    }
    
    function updateCart(){
        $this->Session->updateCart($_GET['id'],$_GET['quantity']);
    }

    function destroyCart()
    {
        $this->Session->emptyCart();
    }

    function payment(){
        if (!$this->Session->isLogged()){
            $this->Session->setFlash("Veuillez vous connecter afin de procéder au paiement");
            redirect(BASE_URL.DS.'user'.DS.'login');
        }else{
            if ($this->Session->getTotalPrice()>0){

                
                $this->loadModel('Orders');
                $this->loadModel('Product');
                $this->loadModel('Lnk_orders_product');
                $this->Orders->db->beginTransaction();
                $this->Orders->insertOrder($this->Session->get('User')->uid,$this->Session->getTotalPrice());
                $oid = $this->Orders->getLastId();
                $this->Lnk_orders_product->insertLnk($oid,$this->Session->get('Cart'));
                $res = $this->Orders->db->commit();
                if ($res){
                    $this->Session->emptyCart();
                }else{
                    redirect(BASE_URL.DS.'product'.DS.'cart');
                }
            
            }else{
                $this->Session->setFlash("Veuillez ajouter au moins un article");
                redirect(BASE_URL.DS.'product'.DS.'cart');
            }
        }
        
    }

    
    
}