<?php

class Product extends Model{
   
    public function insert($data){
       $sql = 'INSERT INTO '. $this->table . '(name,format,price,promotion,sid,cid,img_url) values(';
       $values = array();
       foreach($data as $k=>$v){
           if(!is_numeric($v)){
                $v = $this->db->quote($v);
           }
           $values[] = "$v";
       }

       $sql .= implode(',',$values) . ');'; 
       $pre = $this->db->prepare($sql);
       $pre->execute();


    }

}