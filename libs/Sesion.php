<?php

	require_once "Database.php";
	require_once "modelos/Usuario.php";

	class Sesion{
        
	private $usuario;
	private $time_expire = 3000;
	private static $instancia = null;


	private function __construct(){ 
		
	}

	private function __clone(){ 

	}

	public function getUsuario(){
		return $this->usuario;
	}

	public function close(){

		$_SESSION = [];

		session_destroy();
	}

	public static function getInstance(){
		session_start();

		if (isset($_SESSION["_sesion"])) :
			self::$instancia = unserialize($_SESSION["_sesion"]);
		else :
			if (self::$instancia === null)
				self::$instancia = new Sesion();
		endif;

		return self::$instancia;
	}

	public function login(string $email, string $pass): bool{

		include_once('libs/Database.php');

		$db = Database::getInstance();

		$sql = "SELECT * FROM usuario WHERE email=? AND pass=MD5(?) ;";

		if ($db->query($sql, [$email, $pass])->rowCount() > 0) :

			$this->usuario = $db->getObject("Usuario");

			$_SESSION["time"]    = time();
			$_SESSION["_sesion"] = serialize(self::$instancia);

			return true;

		endif;

		return false;
	}

	public function isExpired(): bool{
		return (time() - $_SESSION["time"] > $this->time_expire);
	}

	public function isLogged(): bool{
		return !empty($_SESSION);
	}

	public function checkActiveSession(): bool{
		if ($this->isLogged())
			if (!$this->isExpired()) return true;

		return false;
	}

	public function redirect(string $url){
		header("Location: $url");
		die();
	}


}