<?php 
    
    namespace core;

    use core\conectar;

    class entidadBase
    {
        private $table;
        private $db;
        private $conectar;

        public function __construct($table)
        {
            $this->table = (string)$table;
            $this->conectar = new conectar();
            $this->db = $this->conectar->conexion();
        }

        
        /**
        * convertir consulta en un array 
        * @param query //consulta
        * @return resulSet //retorno del array
        */
        public function converToArray($query)
        {
            if($row=$query->fetch_object())
            {
                $resultSet = $row;
            }
            return $resultSet;
        }

        public function DB($sql,$delete=null)
        {
            $query = $this->db->query($sql);

            if($delete==null){
                if($query==true)
                {
                    if($query->num_rows>1){
                        while($row = $query->fetch_object()) {
                           $resultSet[]=$row;
                        }
                    }elseif($query->num_rows==1){
                        if($row = $query->fetch_object()) {
                            $response=$row;
                        }
                    }else{
                        $response=true;
                    }
                }else{
                    $response=false;
                } 
                
                return $response;
            }else{
                return $query;
            }

            
        }

        public function getConectar()
        {
            return $this->conectar;
        }

        public function getAll()
        {
            $sql = ("SELECT * FROM $this->table ORDER BY id DESC");

            $response = $this->DB($sql);

            return $response;
            
        }

        public function getById($id)
        {
            $sql = ("SELECT * FROM $this->table WHERE id=$id");

            $response = $this->DB($sql);

            return $response;
        }

        public function deleteById($id)
        {
            $sql = ("DELETE FROM $this->table WHERE id=$id");

            $response = $this->DB($sql,true);

            return $response;
        }

        public function deleteBy($column,$value){
            $sql = ("DELETE FROM $this->table WHERE $column='$value'");

            $response = $this->DB($sql,true);

            return $response;
        }

    }
    
?>