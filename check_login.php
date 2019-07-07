<?php
// подключаем бд
session_start();
include_once 'db.php';
Db::connect();
// функции для работы
include ("view.php");
include ("model.php");
login();

function login(){
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