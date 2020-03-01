<?php

require_once "libs/Database.php";

    class Cerveza {
        private $CodTipo;
        private $NomTipo;
        private $graduacion;
        private $composicion;
        private $capacidad;
        private $CodMarca;
        private $imgTipo;
        /**/
        public function __construct(){}

        public function getCodTipo(){
            return $this->CodTipo;
        }
        public function getNomTipo(){
            return $this->NomTipo;
        }
        public function getGraduacion(){
            return $this->graduacion;
        }
        public function getComposicion(){
            return $this->composicion;
        }

        public function getCapacidad(){
            return $this->capacidad;
        }

        public function getCodMarca(){
            return $this->CodMarca;
        }
        public function getimgTipo(){
            return $this->imgTipo;
        }

        //Setters

        public function setCodTipo($a){
            $this->CodTipo=$a;
            return $this;
        }
        public function setNomTipo($a){
            $this->NomTipo=$a;
        }
        public function setGraduacion($a){
            $this->graduacion=$a;
        }
        public function setComposicion($a){
            $this->composicion=$a;
        }
        public function setCapacidad($a){
            $this->capacidad=$a;
        }
        public function setCodMarca($a){
            $this->CodMarca=$a;
        }
        public function setimgTipo($a){
            $this->imgTipo=$a;
        }

        public static function findAll(){

            $db = Database::getInstance();

            $db->query("SELECT * FROM cerveza");
    
            $datos = [];
    
            while ($item = $db->getObject("Cerveza")):
                 array_push($datos, $item);
            endwhile;
    
            return $datos;
            
        }

        public static function find($id){
            $db = Database::getInstance();
            $db->query("SELECT * from cerveza where CodTipo=".$id);
            
            return $db->getObject("cerveza");
        }

        public function eliminar(){
            $db = Database::getInstance();
            $db->query("DELETE from cerveza where CodTipo={$this->CodTipo};");
        }

        public function save(){
            $db = Database::getInstance();
            $db->query("INSERT into cerveza (NomTipo, Graduacion, Composicion, Capacidad, CodMarca, imgTipo) values ('{$this->NomTipo}','{$this->graduacion}','{$this->composicion}','{$this->capacidad}','{$this->CodMarca}','{$this->imgTipo}');");

            $this->CodTipo = $db->lastId();
        }
    }