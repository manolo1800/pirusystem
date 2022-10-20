<?php 

    namespace controllers;

    use core\AyudaVistas;
    

    class controladorBase
    {
        public function view($vista,$datos)
        {
            foreach ($datos as $id_assoc => $valor) {
                ${$id_assoc}=$valor;
            }
             
            $helper=new AyudaVistas();
         
            require_once '../views/'.$vista.'View.php';
        }

        public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
            header("Location:index.php?controller=".$controlador."&action=".$accion);
        }
    }

?>