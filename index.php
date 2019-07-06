<!DOCTYPE html>
<html>
<head>
<title>ВКР ШАШЕВ АНТОН</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<style>
.blocks {
	width:100%;
  float:ggolololo
}

.blocks th {
	font-size:12px;
	text-align:center;
	border:solid 1px lightgrey;
}
.blocks td {
	font-size:11px;
	padding:5px;
	border: solid 1px white;
	background:lightgrey;
	text-align:center;
}
.col0 {
	width:100px;
}
.col1 {
	width:100px;
}
.col2 {
	width:100px;
}
.col3 {
	width:100px;
}
.col4 {
	width:100px;
}
.col5 {
	width:100px;
}
.col6 {
	width:100px;
}
.col7 {
	width:100px;
}
.col8 {
	width:100px;
}


</style>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button> 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Записи <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="new.php">Новая запись</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="check.php">Проверка реестра</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Настройки
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="keys.php">Ключи и сертификаты</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="about.php">О проекте</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout">Выход</a>
      </li>
	  </ul>
	  <span class="nav-text">
	  <?php echo "<span style=\"color:white; text-align:right;margin-left:10px;\" class=\"time\">Клиентское время <span id=\"time\"></span> | Серверное время ".date("d.m.Y H:i:s") . "</span>"; ?>
	  </span>
    
  </div>
</nav>

<div class="">

<?php

 
function reload(){ 
include 'database-connect.php'; // подключаем скрипт
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
     
$query ="SELECT * FROM data";
 echo "<h1>Список блоков</h1>";

// подключаемся к серверу

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<div style=\"width:100%;overflow-y:hidden;\"><table class=\"blocks\"><tr><th class=\"col0\">Id</th><th class=\"col1\">Type</th><th class=\"col2\">Data</th><th class=\"col3\">Link1</th><th class=\"col4\">Link2</th><th class=\"col5\">Weight</th><th class=\"col6\">Date</th><th class=\"col7\">Sign</th><th class=\"col8\">Hash</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            //for ($j = 0 ; $j < 9 ; ++$j) echo "<td>$row[$j]</td>"; 
			echo "<td class=\"col0\">$row[0]</td><td class=\"col1\">$row[1]</td><td class=\"col2\">$row[2]</td><td class=\"col3\">$row[3]</td><td class=\"col4\">$row[4]</td><td class=\"col5\">$row[5]</td><td class=\"col6\">$row[6]</td><td class=\"col7\">$row[7]</td><td class=\"col8\">$row[8]</td>";
        echo "</tr>";
    }
    echo "</table></div>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
}
 
 reload();



?>
<!-- ПРОВЕРКА БИБЛИОТЕКИ OPENSSL и вывод типов кривых.-->
<?php
$digests             = openssl_get_md_methods();
$digests_and_aliases = openssl_get_md_methods(true);
$digest_aliases      = array_diff($digests_and_aliases, $digests);
$curve_names = openssl_get_curve_names();
//print_r($curve_names);
//print_r($digests);
//echo ' ';
//print_r($digest_aliases);

?>
</div>
<!--
<h2>Введи свои данные:</h2>
<form method="POST" action="insert-db.php">
<p>Введите данные <br><input id='data' name="data"></input></p>
<input id="button" type="submit" value="Отправить">
</form>

<form method="POST" action="keycheck.php">
<input id="button" type="submit" value="Проверка key">
</form>
<form method="POST" action="newkey.php">
<input id="button" type="submit" value="Получить ключи">
</form>
-->
</body>
</html>

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
