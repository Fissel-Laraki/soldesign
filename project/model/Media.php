<?php

class Media extends Model{

    public function insert($id,$url){

 
         echo $id;
 
         $sql = 'INSERT INTO '.$this->table.'(url,aid) values('.$this->db->quote($url).','.$id.');';
         $pre = $this->db->prepare($sql);
         $pre->execute();
    }


    
}