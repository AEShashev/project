<?php
// подключаем бд
////////session_start();
include_once 'connect.php';
//Db::connect();
// функции для работы
//include ("view.php");
//include ("model.php");


/*function login(){
	if(!empty($_POST)){
		Account::validate(['login', 'password'], $_POST);		
		if(!Account::checkData($_POST['login'], $_POST['password'])){
			View::messageModal('Ошибка!', 'Логин или пароль неправильные');
		}
		Account::login($_POST['login']);
		$_SESSION['user'] = 'yes';
		View::location('');
	}
	else exit(json_encode([
		'status' => 'error',
		'message' => 'Данные не пришли',
	]));
}
login();
*/

function login() {

	$login = $_POST["login"];
	$pass =PASSWORD_BCRYPT( $_POST["password"]);

	include 'connect.php'; // подключаем скрипт
	$connect = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link)); 

		$result1 = mysqli_query($connect, "SELECT login,pass FROM `users` WHERE login = '$login' and pass = '$pass'") or die ("Ошибка ". mysqli_error($connect));
				
		
		while($row = mysqli_fetch_array($result1)){
			$link1=$row['id'];
			echo "<p>ID = $link1</p>"; 	
		}
		// очищаем результат
		mysqli_free_result($result);
	
	 
	mysqli_close($link);
	


}

?>