<?php
namespace Ngin\Database;
/**
* Database Connection
* @author Nickson Ariemba
*/

use PDO;
//use Engine\PublicEngine\PublicEngine as PublicEngine;

class DatabaseConnect
{
	# @object, The PDO object
	public $pdo;

	# @array,  The database connect
	public $connect = [
		'host'=>"localhost", 
		'user'=>"root", 
		'password'=>"root", 
		'dbname'=>""
	];

	# @bool ,  Connected to the database
	public $bConnected = false;


	protected function databaseConnection($databaseName = null)
	{
		$dsn = 'mysql:dbname='.$this->connect["dbname"].';host='.$this->connect["host"].'';
		$this->pdo = new PDO(
			$dsn, 
			$this->connect["user"], 
			$this->connect["password"], 
			array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
		);

		$stmt = $this->pdo->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$databaseName'");

		$count = $stmt->fetchColumn();

		if ($count > 0) {
			$this->connect['dbname'] = $databaseName;
			//echo "<br>sent in<br>";
		}
		
		if ($count == 0){
			$this->connect['dbname'] = "ecom";
			//echo "<br>not sent in<br>";
		}
	}


	protected function connect()
	{
		$dsn = 'mysql:dbname='.$this->connect["dbname"].';host='.$this->connect["host"].'';
		try 
		{
			$this->pdo = new PDO($dsn, $this->connect["user"], $this->connect["password"], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			
			# We can now log any exceptions on Fatal error. 
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			# Disable emulation of prepared statements, use REAL prepared statements instead.
			$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			
			# Connection succeeded, set the boolean to true.
			$this->bConnected = true;
		}
		catch (PDOException $e) 
		{
			# Write into log
			echo $this->ExceptionLog($e->getMessage());
			die();
		}
	}
}
?>