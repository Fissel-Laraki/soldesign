
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

    function article($id){
        if (!$this->Session->isAdmin()){

            $this->loadModel('Media');
            $this->loadModel('Product');
            $this->loadModel('Category');
            $this->loadModel('Serie');
            $this->Product->primaryKey = 'pid';
            $this->Media->primaryKey = 'mid';

            $data['product'] = $this->Product->findFirst(array(
            'conditions' => array('pid'=>$id) 
            ));

            $data['product']->serie = $this->Serie->findFirst(array(
                'conditions' => array('sid'=> $data['product']->sid)
            ))->name;

            $data['product']->category = $this->Category->findFirst(array(
                'conditions' => array('cid'=> $data['product']->cid)
            ))->name;

            $data['images'] = $this->Media->find(array(
                'conditions' => array('aid' => $id)
            ));

            
            $this->set($data);
        }else{
            redirect(BASE_URL.DS.'admin'.DS);
        }
    }

    function cart(){
        if ($this->Session->getTotalPrice() == 0){
            $this->Session->setFlash("Veuillez ajouter au moins un article");
            $this->set('empty',true);
        }else{
            $this->set('empty',false);
        }
        
    }

    function addCart($id){
        $this->loadModel('Product');
        $product = $this->Product->findFirst(array(
            'conditions' => array('pid' => $id)
        ));
        $this->Session->addCart($id,$product);
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
            if (/*$this->Session->getTotalPrice()>0*/ true){

                $this->loadModel('Orders');
                $this->loadModel('Lnk_orders_product');
                $this->Orders->db->beginTransaction();
                $this->Orders->insert($this->Session->get('User')->uid,$this->Session->getTotalPrice());
                $oid = $this->Orders->getLastId();
                $this->Lnk_orders_product->insert($oid,$this->Session->get('Cart'));
                $res = $this->Orders->db->commit();
                if ($res){
                    $this->Session->emptyCart();
                    $this->Session->setFlash("Votre commande est bien passée","success");
                }else{
                    $this->Session->setFlash("Votre commande a échoué");
                    redirect(BASE_URL.DS.'product'.DS.'cart');
                }
            
            }else{
                $this->Session->setFlash("Veuillez ajouter au moins un article");
                redirect(BASE_URL.DS.'product'.DS.'cart');
            }
        }
        
    }

    
    
}