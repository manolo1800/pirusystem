<?php 

    namespace models;

    use core\entidadBase;

    class modeloBase extends entidadBase
    {
        private $table;

        public function __construct($table)
        {
            $this->table = (string)$table;
            parent::__construct($table);
        }

        public function ejecutarSql($sql)
        {
            $response = $this->DB($sql);

            return $response;
        }
    }

?>