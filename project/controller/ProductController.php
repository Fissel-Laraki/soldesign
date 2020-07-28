
<?php

class ProductController extends Controller{

    
    function index(){
        if (!$this->Session->isAdmin()){

            $perPage = 20;
            $this->loadModel('Product');

            $this->Product->primaryKey = 'pid';
            $conditions = array();
            $products = $this->Product->find(array(
                'conditions' => $conditions,
                'limit' => ($perPage*($this->request->page-1)).','.$perPage
            ));

            $data['total'] = $this->Product->findCount($conditions);
            $data['products'] = $products;
            $data['page'] = ceil($data['total']/$perPage);
            $this->set($data);
        }else{
            redirect(BASE_URL.DS.'admin'.DS.'articles');
        }
    }

    function article($id){
        if (!$this->Session->isAdmin()){

            $this->loadModel('Media');
            $this->loadModel('Product');
            $this->Product->primaryKey = 'pid';
            $this->Media->primaryKey = 'mid';

            $data['product'] = $this->Product->findFirst(array(
            'conditions' => array('pid'=>$id) 
            ));

            $data['images'] = $this->Media->find(array(
                'conditions' => array('aid' => $id)
            ));

            $this->set($data);
        }else{
            redirect(BASE_URL.DS.'admin'.DS);
        }
    }

    function cart(){

    }

    function addCart($id){
        $this->loadModel('Product');
        $product = $this->Product->findFirst(array(
            'conditions' => array('pid' => $id)
        ));
        $this->Session->addCart($id,$product->price,$product->name);
        redirect(BASE_URL.DS.'product'.DS);
    }

    function destroyCart()
    {
        $this->Session->destroy();
        redirect(BASE_URL.DS.'product'.DS);
    }

    
    
}