<!DOCTYPE html>
<html>
<head>
<title>MBT</title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
</head>

<body class="text-center">
<p>Good</p>

</body>

1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
<?
include ('db.php'); //подключаемся к БД
#include ('lib/module_global.php'); //подключаем файл с глобальными функциями

 
if($_GET['action'] == "out") out(); //если передана переменная action, «разавторизируем» пользователя
 
if (login()) //вызываем функцию login, определяющую, авторизирован юзер или нет

{
	$UID = $_SESSION['id']; //если юзер авторизирован, присвоим переменной $UID его id
	$admin = is_admin($UID); //определяем, админ ли юзер

}
else //если пользователь не авторизирован, то проверим, была ли нажата кнопка входа на сайт
{
	if(isset($_POST['log_in'])) 
	{
		$error = enter(); //функция входа на сайт

		if (count($error) == 0) //если нет ошибок, авторизируем юзера
		{
			$UID = $_SESSION['id'];

			$admin = is_admin($UID);
		}
	}
}
include ('tpl/index.html'); //подключаем файл с формой

?>

<script> 
	  

$( document ).ready(function() {
    console.log( "ready!" );
var dt = new Date();
var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds()
	$("#time").html(time);
	
});

var timerId = setInterval(function() {
	var dt = new Date();
var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds()
$("#time").html(time);
}, 1000);


	
</script>
