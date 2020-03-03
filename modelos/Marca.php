<?php


require_once "libs/Database.php";

    class Marca {
        private $CodMarca;
        private $NomMarca;
        private $pais;
        private $imgMarca;
        
        public function __construct(){}

        public function getCodMarca(){
            return $this->CodMarca;
        }
        public function getNomMarca(){
            return $this->NomMarca;
        }

        public function getPais(){
            return $this->pais;
        }

        public function getimgMarca(){
            return $this->imgMarca;
        }

        //Setters

        public function setCodMarca($a){
            $this->CodMarca=$a;
            return $this;
        }
        public function setNomMarca($a){
            $this->NomMarca=$a;
        }
        public function setPais($a){
            $this->pais=$a;
        }

        public function setimgMarca($a){
            $this->imgMarca=$a;
        }

        public static function findAll(){

            $db = Database::getInstance();

            $db->query("SELECT * FROM marca");
    
            $datos = [];
    
            while ($item = $db->getObject("Marca")):
                 array_push($datos, $item);
            endwhile;
    
            return $datos;
            
        }

        public static function find($id){
            $db = Database::getInstance();
            $db->query("SELECT * from marca where CodMarca=".$id);
            
            return $db->getObject("marca");
        }

        public function eliminar(){
            $db = Database::getInstance();
            $db->query("DELETE from marca where CodMarca={$this->CodMarca};");
        }

        public function save(){
            $db = Database::getInstance();
            $db->query("INSERT into marca (NomMarca, pais, imgMarca) values ('{$this->NomMarca}','{$this->pais}','{$this->imgMarca}');");

            $this->CodMarca = $db->lastId();
        }

        public static function obtenerId($marc){
            
            $db = Database::getInstance();

            $db->query("SELECT * from marca where NomMarca like '".$marc."'");

            return $db->getObject("marca");
        }
        
    }