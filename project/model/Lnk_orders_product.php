<?php 

class Lnk_orders_product extends Model{

    function insert($oid,$cart){
        foreach($cart as $pid=>$v){
            $sql = "INSERT INTO ".$this->table."(oid,pid,quantity) values (?,?,?);";
            $pre = $this->db->prepare($sql);
            $pre->execute(array($oid,$pid,$v['quantity']));
        }
    }

    function getProductsOfOrder($oid){
        $sql = "select p.img_url,p.name,p.format,p.price,l.quantity from lnk_orders_product l inner join product p on p.pid = l.pid where l.oid = ?;";
        $pre = $this->db->prepare($sql);
        $pre->execute(array($oid));
        return $pre->fetchAll(PDO::FETCH_OBJ);
    }
}