<?php

class Adress extends Model{

    function insert($data){

       $sql = 'INSERT INTO '. $this->table . '(street,city,country,code) values(';
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