
<?php

class Category extends Model{

    public function insert($data){
        $sql = 'INSERT INTO '.$this->table.'(name) values(?);';
        $pre = $this->db->prepare($sql);
        $pre->execute(array($data->name));
    }

    
}