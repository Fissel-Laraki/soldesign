<?php

class Product extends Model{
   
    public function insert($data){
       $keyz = array_keys((array)$data);
       $keys = array();
       $sql = 'INSERT INTO '. $this->table . '(';
       foreach($keyz as $key){
           $keys[] = $key;
       }
       $sql .= implode(',',$keys).') values(';
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