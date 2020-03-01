<?php

	 class Database {

	 	private $user = 'root' ;
	 	private $pass = '' ;
	 
	 	private $pdo ;
	 	private static $instance = null ;

	 	private function __construct(){
	 		$dsn = 'mysql:charset=UTF8;host=localhost;dbname=cervezaphp2';

	 		try {
	 			$this->pdo = new PDO($dsn, 
	 								 $this->user, 
	 								 $this->pass) ;
	 		} catch (PDOException $e) {
	 			die ('**ERROR: se ha producido un error en la conexión con la base de datos.') ;
	 		}
	 	}

	 	public function getInstance(){
	 		if (self::$instance==null) 
	 			self::$instance = new Database() ;

	 		return self::$instance ;
	 	}

		public function __destruct(){
			$this->pdo = null ;
		}

		public function query($sql, $parameters = []) {

			$this->res = $this->pdo->prepare($sql);
			$this->res->execute($parameters);

			
			return $this->res;
		}

		public function getObject(string $cls = "StdClass"){
			return $this->res->fetchObject($cls) ;
		}
		
		public function lastId(){
			return $this->pdo->lastInsertId() ;
		}

	 }