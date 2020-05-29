<?php 

class Dbh {
	private $host = 'localhost';
	private $user = 'root';
	private $dbName = 'hello';
	private $pwd = 'abdullah';

	protected function connect() {
		try {

			$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName;
			$pdo = new PDO($dsn, $this->user, $this->pwd);

			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $pdo;			
		} catch (PDOException $e) {
			echo "Error Connecting: ".$e->getMessage();
		}
	}
}