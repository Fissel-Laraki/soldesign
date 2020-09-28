
<?php

class Lnk_product_characteristic extends Model{
    function insertLnk($data,$id){
        $sql = 'INSERT INTO '. $this->table .' (pid,chid,value) values';
        $d = array();
        foreach($data as $k => $v){
            $d[] = "(".$id.",".$k.",'".$v."')";
        }
        $sql .= implode(',',$d);
        $pre = $this->db->prepare($sql);
        $pre->execute();

    }

    function findCharacteristics($id){
        $sql = "SELECT  * FROM " .$this->table . " l INNER JOIN characteristic c ON l.chid = c.chid WHERE l.pid = ". $id;
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);
    }

    function editCharacteristics($pid,$chid,$value){
        $sql = "UPDATE " .$this->table . " SET value = ? WHERE pid = ? AND chid = ?";
        $pre = $this->db->prepare($sql);
        $pre->execute(array($value,$pid,$chid));

    }
}