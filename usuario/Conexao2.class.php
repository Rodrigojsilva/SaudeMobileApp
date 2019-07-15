<?php
class Conexao2{
	private static $user = "root";
	private static $senha = "";
	private static $host = "localhost";
	protected static $conn;
	private function __construct(){
		self::$conn= new PDO('mysql:host=localhost;dbname=appmobile', self::$user, self::$senha);
		self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		self::$conn->exec('SET NAMES utf8');
	
	}
	public static function conexao2(){
		if (!self::$conn) {
            		new Conexao2();
        	}
        	
        	return self::$conn;
	}
	
}

?>