
<?php

class ProductController extends Controller{

    
    function index(){
        $perPage = 20;

        $this->loadModel('Product');
        $this->Product->primaryKey = 'pid';
        $conditions = array();
        $data['total'] = $this->Product->findCount($conditions);
        $data['products'] = $this->Product->find(array(
            'conditions' => $conditions,
            'limit' => ($perPage*($this->request->page-1)).','.$perPage
        ));
        $data['page'] = ceil($data['total']/$perPage);
        $this->set($data);
    }

    function article($id){
        $this->loadModel('Product');
        $this->Product->primaryKey = 'pid';

        $product = $this->Product->findFirst(array(
           'conditions' => array('pid'=>$id) 
        ));
        $this->set('product',$product);
        
    }

    
    
}