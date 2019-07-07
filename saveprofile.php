<?php 
include 'connect.php'; // подключаем скрипт
$connect = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 

$pID = $_POST["pID"];
$name = $_POST["name"];
$inn = $_POST["inn"];
$address = $_POST["address"];
$bik = $_POST["bik"];
$Acc = $_POST["Acc"];
$kAcc = $_POST["kAcc"];
$bank = $_POST["bank"];

$create1 = mysqli_query($connect, "UPDATE providers SET Name = '$name', INN = '$inn', Acc = '$Acc', kAcc = '$kAcc', bik = '$bik', adres = '$address', bank = '$bank'  WHERE pID = '$pID'") or die("Ошибка " . mysqli_error($connect)); 	

 if ($create1) {
     echo "Данные успешно сохранены";
 }
 else {
     echo "Ошибка";
 }

mysqli_close($connect);

header("refresh: 1; url=/project/provider.php#profile");

?>