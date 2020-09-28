
<?php

class AdminController extends Controller{

    

    

    function articles(){

        $perPage = 20;
        $this->loadModel('Product');
        $this->loadModel('Serie');
        $this->loadModel('Category');
        $this->loadModel('Format');
        $this->loadModel('Characteristic');
        $this->loadModel('Type');
        $this->loadModel('Accessory');
        $this->loadModel('Consumable');

        $accessories = $this->Accessory->find(array());
        $consumables = $this->Consumable->find(array());

        $this->Product->primaryKey = "pid";

        $characteristics = $this->Characteristic->find(array(
            'conditions' => array()
        ));
        $products = $this->Product->find(array(
            'limit' => ($perPage*($this->request->page-1)).','.$perPage
        ));
        $series = $this->Serie->find(array(
            'conditions' => "name != 'Toutes'"
        ));
        $categories = $this->Category->find(array(
            'conditions' => "name != 'Toutes'"
        ));
        $formats = $this->Format->find(array(
            'conditions' => "name != 'Tous'"
        ));
        $types = $this->Type->find(array(
            'conditions' => array()
        ));

        $typeRef = array();

        foreach($types as $type){
            $typeRef[$type->tid] = $type->name;
        }

        $data['accessories'] = $accessories;
        $data['consumables'] = $consumables;
        $data['total'] = $this->Product->findCount();
        $data['page'] = ceil($data['total']/$perPage);
        $data['categories'] = $categories;
        $data['series'] = $series;
        $data['products'] = $products;
        $data['formats'] = $formats;
        $data['characteristics'] = $characteristics;
        $data['types'] = $types;
        $data['typeRef'] = $typeRef;
        $this->set($data);
        
    }

    function deleteArticle($pid,$page){
        $this->loadModel('Product');
        $this->Product->primaryKey = 'pid';
        $this->Product->edit($pid,array(
            'deleted' => '1'
        ));
        redirect(BASE_URL.DS.'admin'.DS.'articles?page='.$page);

    }

    function restoreArticle($pid,$page){
        $this->loadModel('Product');
        $this->Product->primaryKey = 'pid';
        $this->Product->edit($pid,array(
            'deleted' => '0'
        ));
        redirect(BASE_URL.DS.'admin'.DS.'articles?page='.$page);

    }


    function addArticle(){
        $this->loadModel('Product');
        $this->loadModel('Category');
        $this->loadModel('Serie');
        $this->loadModel('Media');
        $this->loadModel('Lnk_product_characteristic');
        
        $this->Serie->primaryKey = 'sid';
        $this->Category->primaryKey = 'cid';
        

        $data2 = (object)[];
        $data = $this->request->data;
        $files = diverse_array($_FILES['files']);
        $data->img_url = $_FILES['file']['name'];
        
        foreach($data as $k => $v){
            if(is_numeric($k)){
                unset($data->$k);
                $data2->$k = $v;
            }
        }        
        $this->Product->insert($data);

        $lastId = $this->Product->getLastId();
        $dest = WEBROOT.DS.'img/';
 
        foreach($files as $file){
            move_uploaded_file($file['tmp_name'],$dest.$file['name']);
            $this->Media->insertMedia($lastId,$file['name']);
        }

        $this->Lnk_product_characteristic->insertLnk($data2,$lastId);

 
        move_uploaded_file($_FILES['file']['tmp_name'],$dest.$_FILES['file']['name']);

        redirect(BASE_URL.DS.'admin'.DS.'articles');
    }

    function editArticle($id){
        $this->loadModel('Product');
        $this->Product->primaryKey = 'pid';
        if (!$this->request->data){
            // If data hasn't been sent through post method 
            $this->loadModel('Media');
            $this->loadModel('Serie');
            $this->loadModel('Category');
            $this->loadModel('Format');
            $this->loadModel('Lnk_product_characteristic');
            $this->loadModel('Type');
            $this->loadModel('Accessory');
            $this->loadModel('Consumable');


            $typestmp = $this->Type->find(array());
            $types = array();
            
            foreach($typestmp as $tmp){
                $types[$tmp->name] = $tmp->tid;
            }
            
            $product =  $this->Product->findFirst(array(
                'conditions' => array('pid'=>$id)
            ));


            $images = $this->Media->find(array(
                'conditions' => array('aid' => $product->pid)
            ));

            if ($product->tid == $types['tile']){

                $series = $this->Serie->find(array());
                $categories = $this->Category->find(array());
                $formats = $this->Format->find(array(
                    'conditions' => "name != 'Tous'"
                ));

                $current_serie = $this->Serie->findFirst(array(
                    'conditions' => array('sid'=>$product->sid)
                ))->name;

                $current_category = $this->Category->findFirst(array(
                    'conditions' => array('cid'=>$product->cid)
                ))->name;

                $data['formats'] = $formats;
                $data['current_serie'] = $current_serie;
                $data['current_category'] = $current_category;
                $data['categories'] = $categories;
                $data['series'] = $series;
                $data['currentTile'] = (object)array(
                    'tid' => $types['tile'],
                    'name' => 'tile'
                );  

            }else if($product->tid == $types['accessory']){
                
                $accessories = $this->Accessory->find(array());
                $data['accessories'] = $accessories;
                $data['currentAccessory'] = (object)array(
                    'tid' => $types['accessory'],
                    'name' => 'accessory'
                );
            }else {// consumables
                
                $consumables = $this->Consumable->find(array());
                $data['consumables'] = $consumables;
                $data['currentConsumable'] = (object)array(
                    'tid' => $types['consumable'],
                    'name' => 'consumable'
                );
            }

            $characteristics = $this->Lnk_product_characteristic->findCharacteristics($id);
            
            
            $data['product'] = $product;
            $data['images'] = $images;
            $data['characteristics'] = $characteristics;
            $data['isTile'] = $product->tid == $types['tile'];
            $data['isAccessory'] = $product->tid == $types['accessory'];
            $data['isConsumable'] = $product->tid == $types['consumable'];


            $this->set($data);
        }else{
        
            $this->loadModel('Category');
            $this->loadModel('Serie');
            $this->loadModel('Media');
            $this->loadModel('Lnk_product_characteristic');

            $this->Serie->primaryKey = 'sid';
            $this->Category->primaryKey = 'cid';
            $this->Media->primaryKey = 'mid';

            $data = $this->request->data;

            if(isset($data->available)){
                $data->available = 1;
            }else{
                $data->available = 0;
            }

            $product = $this->Product->findFirst(array(
                'conditions' => array('pid'=>$id)
            ));

            $data2 = (object) [];
            foreach($data as $k => $v){
                if(is_numeric($k)){
                    unset($data->$k);
                    $data2->$k = $v;
                }
            }        

            $dest = WEBROOT.DS.'img/';
            $data->sid = $data->serie;
            $data->cid = $data->category;
            if ($_FILES['file']['name']){
                unlink(SOURCE.DS.'img'.DS.$product->img_url);
                $data->img_url = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'],$dest.$_FILES['file']['name']);
            }
            

            if ($_FILES['files']['name'][0]){
                $files = diverse_array($_FILES['files']);
                $images = $this->Media->find(array(
                    'conditions' => array('aid' => $id)
                ));
                $imgs = array();
                foreach($images as $i){
                    $imgs[] = $i->url;
                }
                debug($imgs);
                foreach($files as $file){
                    echo $file['name'];
                    if (!in_array($file['name'],$imgs)){
                        echo "added ";
                        move_uploaded_file($file['tmp_name'],$dest.$file['name']);
                        $this->Media->insertMedia($id,$file['name']);
                    }
                }
                
            }
            unset($data->serie);
            unset($data->category);

            $this->Product->edit($id,$data);  
            foreach($data2 as $k=>$v){
                $this->Lnk_product_characteristic->editCharacteristics($id,$k,$v);
            }
            redirect(BASE_URL.DS.'admin'.DS.'articles');
        }

    }

    function categories(){

        $this->loadModel('Category');

        $categories = $this->Category->find(array());
    
        $data['categories'] = $categories;

        $this->set($data);
    }
    
    
    function deleteCategory($cid){
        $this->loadModel('Category');
        $this->Category->primaryKey = 'cid';
        $this->Category->delete($cid);
        redirect(BASE_URL.DS.'admin'.DS.'categories');

    }

    function addCategory(){

        $this->loadModel('Category');
        
        $this->Category->primaryKey = 'cid';
        
        $data = $this->request->data;
        $data->img_url = $_FILES['file']['name'];

        $this->Category->insert($data);

        $dest = WEBROOT.DS.'img'.DS.'categories';
        move_uploaded_file($_FILES['file']['tmp_name'],$dest.DS.$_FILES['file']['name']);

        redirect(BASE_URL.DS.'admin'.DS.'categories');
    }

    function editCategory($cid){
        $this->loadModel('Category');
        $this->Category->primaryKey = 'cid';
        if(!$this->request->data){
            // If we didn't received POST data
            $category = $this->Category->findFirst(array(
                'conditions' => array('cid' => $cid)
            ));
            
            $data['category'] = $category;

            $this->set($data);

            
        }else{
            $data = $this->request->data;
            if ($_FILES['file']['name']){
                $dest = WEBROOT.DS.'img'.DS.'categories';
                unlink($dest.$product->img_url);
                $data->img_url = $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'],$dest.$_FILES['file']['name']);
            }
            

            $this->Category->edit($cid,$data);
            redirect(BASE_URL.DS.'admin'.DS.'categories');

        }
    }
    

    function series(){

        $this->loadModel('Serie');

        $series = $this->Serie->find(array());
    
        $data['series'] = $series;

        $this->set($data);
    }
    
    
    function deleteSerie($sid){
        $this->loadModel('Serie');
        $this->Serie->primaryKey = 'sid';
        $this->Serie->delete($sid);
        redirect(BASE_URL.DS.'admin'.DS.'series');

    }

    function addSerie(){

        $this->loadModel('Serie');
        
        $this->Serie->primaryKey = 'sid';
        
        $data = $this->request->data;

        $this->Serie->insert($data);

        redirect(BASE_URL.DS.'admin'.DS.'series');
    }

    function editSerie($sid){
        $this->loadModel('Serie');
        $this->Serie->primaryKey = 'sid';
        if(!$this->request->data){
            // If we didn't received POST data
            $serie = $this->Serie->findFirst(array(
                'conditions' => array('sid' => $sid)
            ));
            
            $data['serie'] = $serie;

            $this->set($data);

            
        }else{

            $this->Serie->edit($sid,$this->request->data);
            redirect(BASE_URL.DS.'admin'.DS.'series');

        }
    }

    function other(){
        $this->loadModel('Product');
        $this->loadModel('Characteristic');
        $characteristics = $this->Characteristic->find(array(
            'conditions' => array()
        ));
        $elements = $this->Product->find(array(
            'conditions' => array()
        ));
        $data['elements'] = $elements;
        $data['characteristics'] = $characteristics;

        $this->set($data);
    }

    function deleteMedia($id){
        $this->loadModel('Media');
        $this->Media->primaryKey = 'mid';


        $image = $this->Media->findFirst(array(
            'conditions' => array('mid' => $id)
        ));
        
        $aid = $image->aid;
        unlink(SOURCE.DS.'img'.DS.$image->url);
        $this->Media->delete($id);

        redirect(BASE_URL.DS.'admin'.DS.'editArticle'.DS.$aid);
    }
    
    
    function orders(){
        $this->loadModel('Orders');
        $orders = $this->Orders->getWaitOrders();
        $data['orders'] = $orders;
        $this->set($data);
    }

    function updateOrder($oid){
        $this->loadModel('Orders');
        $this->loadModel('Product');
        $this->loadModel('Lnk_orders_product');
        $this->Orders->update(" status = 'Traitée' ", " oid = ".$oid);

        $cart = $this->Lnk_orders_product->getProductsOfOrder($oid);
        foreach($cart as $item){
            $this->Product->update("quantity = quantity - ".$item->quantity,"pid = ".$item->pid);
        }
        
    }


    function consumables(){
        $this->loadModel('Consumable');
        
        $consumables = $this->Consumable->find(array());

        $data['consumables'] = $consumables;
        $this->set($data);
    }
    function deleteConsumable($coid){
        $this->loadModel('Consumable');
        $this->Consumable->primaryKey = 'coid';
        $this->Consumable->delete($coid);
        redirect(BASE_URL.DS.'admin'.DS.'consumables');

    }

    function addConsumable(){

        $this->loadModel('Consumable');
        
        $this->Consumable->primaryKey = 'coid';
        
        $data = $this->request->data;

        $this->Consumable->insert($data);

        redirect(BASE_URL.DS.'admin'.DS.'consumables');
    }

    function editConsumable($coid){
        $this->loadModel('Consumable');
        $this->Consumable->primaryKey = 'coid';
        if(!$this->request->data){
            // If we didn't received POST data
            $consumable = $this->Consumable->findFirst(array(
                'conditions' => array('coid' => $coid)
            ));
            
            $data['consumable'] = $consumable;

            $this->set($data);

            
        }else{

            $this->Consumable->edit($coid,$this->request->data);
            redirect(BASE_URL.DS.'admin'.DS.'consumables');

        }
    }
    function accessories(){
        $this->loadModel('Accessory');
        
        $accessories = $this->Accessory->find(array());

        $data['accessories'] = $accessories;
        $this->set($data);
    }
    function deleteAccessory($acid){
        $this->loadModel('Accessory');
        $this->Accessory->primaryKey = 'acid';
        $this->Accessory->delete($acid);
        redirect(BASE_URL.DS.'admin'.DS.'accessories');

    }

    function addAccessory(){

        $this->loadModel('Accessory');
        
        $this->Accessory->primaryKey = 'acid';
        
        $data = $this->request->data;

        $this->Accessory->insert($data);

        redirect(BASE_URL.DS.'admin'.DS.'accessories');
    }

    function editAccessory($acid){
        $this->loadModel('Accessory');
        $this->Accessory->primaryKey = 'acid';
        if(!$this->request->data){
            // If we didn't received POST data
            $accessory = $this->Accessory->findFirst(array(
                'conditions' => array('acid' => $acid)
            ));
            
            $data['accessory'] = $accessory;

            $this->set($data);

            
        }else{

            $this->Accessory->edit($acid,$this->request->data);
            redirect(BASE_URL.DS.'admin'.DS.'accessories');

        }
    }

    function characteristics(){
        $this->loadModel('Characteristic');
        
        $characteristics = $this->Characteristic->find(array());

        $data['characteristics'] = $characteristics;
        $this->set($data);
    }
    function deleteCharacteristic($chid){
        $this->loadModel('Characteristic');
        $this->Characteristic->primaryKey = 'chid';
        $this->Characteristic->delete($chid);
        redirect(BASE_URL.DS.'admin'.DS.'characteristics');

    }

    function addCharacteristic(){

        $this->loadModel('Characteristic');
        
        $this->Characteristic->primaryKey = 'chid';
        
        $data = $this->request->data;

        $this->Characteristic->insert($data);

        redirect(BASE_URL.DS.'admin'.DS.'characteristics');
    }

    function editCharacteristic($chid){
        $this->loadModel('Characteristic');
        $this->Characteristic->primaryKey = 'chid';
        if(!$this->request->data){
            // If we didn't received POST data
            $characteristic = $this->Characteristic->findFirst(array(
                'conditions' => array('chid' => $chid)
            ));
            
            $data['characteristic'] = $characteristic;

            $this->set($data);

            
        }else{

            $this->Characteristic->edit($chid,$this->request->data);
            redirect(BASE_URL.DS.'admin'.DS.'characteristics');

        }
    }

}