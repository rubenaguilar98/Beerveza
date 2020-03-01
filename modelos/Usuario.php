<?php
require_once "libs/Sesion.php";
	class Usuario
	{
		private $idUsu ;
		private $email ;
		private $nombre ;
		private $apellidos ;
		private $pass;
		private $fec_nacimiento ;
		private $foto ;
		private $es_admin ;
		public function __construct() { 

		}

	    public function getIdUsu(){
	        return $this->idUsu;
		}
		
	    public function setIdUsu($idUsu){
	        $this->idUsu = $idUsu;

	        return $this;
	    }

	    public function getEmail(){
	        return $this->email;
	    }

	    public function setEmail($email){
	        $this->email = $email;

	        return $this;
	    }

	    public function getNombre(){
	        return $this->nombre;
	    }

	    public function setNombre($nombre){
	        $this->nombre = $nombre;

	        return $this;
	    }

	    public function getApellidos(){
	        return $this->apellidos;
	    }

	    public function setApellidos($apellidos){
	        $this->apellidos = $apellidos;

	        return $this;
	    }

	    public function getFec(){
	        return $this->fec_nacimiento;
	    }

	    public function setFec($fec_nacimiento){
	        $this->fec_nacimiento = $fec_nacimiento;

	        return $this;
	    }

	    public function getFoto(){
	        return $this->foto;
	    }

	    public function setFoto($foto){
	        $this->foto = $foto;

	        return $this;
		}
		
		public function setPass($pass){
	        $this->pass = $pass;

	        return $this;
	    }

	    public function getEsAdmin(){
	        return $this->es_admin;
	    }

	    public function setEsAdmin($es_admin){
	        $this->es_admin = $es_admin;

	        return $this;
		}
		
		public function getUsuario(){
	    	return $this->idUsu." ".$this->nombre." ".$this->apellidos." ".$this->email." ".$this->fec_nacimiento;
	    }

	    public function __toString(){
	    	return $this->idUsu." ".$this->nombre." ".$this->apellidos." ".$this->email." ".$this->fec_nacimiento;
	    }
	

        public static function findAll(){

            $db = Database::getInstance();

            $db->query("SELECT * FROM usuario");
    
            $datos = [];
    
            while ($item = $db->getObject("Usuario")):
                 array_push($datos, $item);
            endwhile;
    
            return $datos;
            
        }

        public static function find($id){
            $db = Database::getInstance();
            $db->query("SELECT * from usuario where idUsu=".$id);
            
            return $db->getObject("usuario");
        }

        public function eliminar(){
            $db = Database::getInstance();
            $db->query("DELETE from usuario where idUsu={$this->idUsu};");
        }


        public function save(){
            $db = Database::getInstance();
            $sql = "INSERT INTO usuario (email,nombre,apellidos,pass,fec_nacimiento) " ;
			$sql.= "VALUES ('{$this->email}','{$this->nombre}','{$this->apellidos}',MD5('{$this->pass}'),'{$this->fec_nacimiento}');" ;

			$db->query($sql);

            $this->idUsu = $db->lastId();
        }
    }