<?php 

class Lnk_orders_product extends Model{

    function insertLnk($oid,$cart){
        foreach($cart as $pid=>$v){
            $sql = "INSERT INTO ".$this->table."(oid,pid,quantity,price) values (?,?,?,?);";
            $pre = $this->db->prepare($sql);
            $pre->execute(array($oid,$pid,$v['quantity'],$v['product']->price));
        }
    }

    function getProductsOfOrder($oid){
        $sql = "select p.img_url,p.name,p.format,l.price,l.quantity,l.pid from lnk_orders_product l inner join product p on p.pid = l.pid where l.oid = ?;";
        $pre = $this->db->prepare($sql);
        $pre->execute(array($oid));
        return $pre->fetchAll(PDO::FETCH_OBJ);
    }
}