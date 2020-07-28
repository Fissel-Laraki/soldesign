
<?php

class Model{

    static $connections = array();

    public $conf = 'default';
    public $table = false;
    public $db;
    public $primaryKey = 'id'; // default is id

    public function __construct(){
        /** Initialize some variables */
        if($this->table === false){
            $this->table = strtolower(get_class($this));
        }

        /** Connect to the DB */
        $conf = Conf::$database[$this->conf];
        if (isset(Model::$connections[$this->conf])){
            $this->db = Model::$connections[$this->conf];
            return true;
        }
        try{
            $pdo = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'].';',$conf['login'],$conf['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            Model::$connections[$this->conf] = $pdo;
            $this->db = $pdo;
        }catch(PDOException $e){
            if(Conf::$debug > 1){
                die($e->getMessage());
            }else{
                die('Canno\'t connect to the database');
            }
        }
        
    }

    public function find($req){

        $sql = 'SELECT ';
        

        if(isset($req['fields'])){
            if(is_array($req['fields'])){
                $sql .= implode(', ',$req['fields']);
            }else{
                $sql .= $req['fields'];
            }
        }else{
            $sql .= '*';
        }
        
        $sql .= ' FROM '.$this->table.' as '.get_class($this).'';
        
        /**
         * Constructing the conditions
         */
        if (isset($req['conditions']) && !empty($req['conditions'])){
            $sql.= ' WHERE ';
            if (!is_array($req['conditions'])){
                $sql .= $req['conditions'];
            }else{
                $cond = array();
                foreach($req['conditions'] as $k=>$v){
                    if (!is_numeric($v)){
                        $v = $this->db->quote($v);
                    }
                    $cond[] = "$k=$v";
                }
                $sql .= implode(' AND ',$cond);
            }
        }
        if (isset($req['limit'])){
            $sql.= ' LIMIT '.$req['limit'];
        }

        $pre = $this->db->prepare($sql);
        $pre->execute();
        return $pre->fetchAll(PDO::FETCH_OBJ);
    }

    public function findFirst($req){
        return current($this->find($req));
    }

    public function findCount($conditions){
        $res = $this->findFirst(array(
            'fields' => 'COUNT('.$this->primaryKey.') as count',
            'conditions' => $conditions
        ));
        return $res->count;
    }

    public function getId($req){
        $element = $this->findFirst($req);
        $key = $this->primaryKey;
        $element_id = $element->{$key};
        return $element_id;
    }

    public function delete($id){
        $sql = 'DELETE FROM '.$this->table. ' WHERE '.$this->primaryKey. '=' .$id;
        $pre = $this->db->prepare($sql);
        $pre->execute();
    }

    public function getLastId(){
        return $this->db->lastInsertId();
    }

    public function edit($id,$data){
        
       $sql = 'UPDATE '. $this->table . ' SET ';
       $values = array();
       foreach($data as $k=>$v){
           if(!is_numeric($v)){
                $v = $this->db->quote($v);
           }
           $values[] = "$k=$v";
       }

       $sql .= implode(',',$values);
       $sql .= ' WHERE '.$this->primaryKey.'='.$id . ';'; 
       $pre = $this->db->prepare($sql);
       $pre->execute();
    }

}
