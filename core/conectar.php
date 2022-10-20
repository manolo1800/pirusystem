<?php
    namespace core;
    
    class conectar
    {
        
        private $driver;
        private $host,$user,$pass,$database,$charset;

        public function __construct()
        {
            $db_cfg = require_once 'config/database.php';
            $this->driver  = $db_cfg['conections']['mysql']['driver'];
            $this->host = $db_cfg['conections']['mysql']['host'];
            $this->user = $db_cfg['conections']['mysql']['user'];
            $this->pass = $db_cfg['conections']['mysql']['pass'];
            $this->database = $db_cfg['conections']['mysql']['database'];
            $this->charset = $db_cfg['conections']['mysql']['charset'];
        }

        public function conexion()
        {
            
            if($this->driver=='mysql' || $this->driver==null)
            {
                $con = new \mysqli($this->host,$this->user,$this->pass,$this->database);
                $con->query("SET NAMES '".$this->charset."'");
            }
            
            return $con;
        }


    }

?>