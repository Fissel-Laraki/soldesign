
<?php

class Category extends Model{

    public function insert($data){
        $sql = 'INSERT INTO '.$this->table.'(name,img_url) values(?,?);';
        $pre = $this->db->prepare($sql);
        $pre->execute(array($data->name,$data->img_url));
    }

    
}