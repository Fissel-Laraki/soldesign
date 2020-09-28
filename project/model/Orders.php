<?php

class Orders extends Model{

    function insertOrder($userId,$total){

        $sql = "INSERT INTO ".$this->table. "(uid,total,status) values (?,?,?);";
        $pre = $this->db->prepare($sql); 
        $pre->execute(array($userId,$total,"En cours"));

    }

    function getWaitOrders(){
        $sql = "SELECT o.oid AS oid ,u.email AS email,u.phone as phone ,o.date AS date,o.total AS total FROM ". $this->table." o INNER JOIN user u ON o.uid=u.uid WHERE status='En cours' ORDER BY o.date DESC";
        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);
    }

}