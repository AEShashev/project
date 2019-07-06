<?php
define("CONFIG_PATH", ROOT. "/config/");
class Db{

	public static function connect(){

		$params = include CONFIG_PATH.'db.php';
		try {
		     $db = new PDO('mysql:host='.$params['host'].';dbname='.$params['dbname'].'',
		     	$params['user'], $params['password']);
		     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		     return $db;
		} 
		catch (PDOException $e) {
		    print "Скрипт прерван! Ошибка подключения: ".$e->getMessage()."<br/>";
		    exit;
		}
	}

	public static function query($sql, $params = []){

		$db = self::connect();
    	$result = $db->prepare($sql);
    	foreach ($params as $key => $value) {
    		$result->bindValue(':'.$key, $value);
    	}
    	if(!$result->execute()) {
    		echo $sql.'<br><br><br>';
    		debug_print_backtrace(0, 3);
    	}
    	return $result;
	}

	public static function rowOne($sql, $params = []){
		$result = self::query($sql, $params);
		return $result->fetch(PDO::FETCH_ASSOC);
	}

	public static function row($sql, $params = []){
		$result = self::query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function column($sql, $params = []){
		$result = self::query($sql, $params);
		return $result->fetchColumn();
	}
}
