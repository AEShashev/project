<?php include ("header.php");

$pID = 0;

?>


<style>
    .tab-pane{
        padding: 20px 10px;
        background-color: white;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .table {   
        background-color: white;
        border-radius: 10px;
    }

    .form{
        background-color: white;
        border-radius: 10px;
        padding: 30px 0;
    }
</style>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Поставщикам</h1>
    </div>

    <div class="">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="items-tab" data-toggle="tab" href="#items" role="tab" aria-controls="items" aria-selected="true">Товары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="storages-tab" data-toggle="tab" href="#storages" role="tab" aria-controls="storages" aria-selected="false">Склады</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Профиль</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Заказы</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active" id="items" role="tabpanel" aria-labelledby="home-tab">
                <h4>Ваши товары</h4>
                <?php


 
function reload(){ 	
include 'connect.php'; // подключаем скрипт
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
    $getpid = mysqli_query($link, "SELECT pID FROM providers WHERE pID = '$_SESSION[id]'") or die("Ошибка " . mysqli_error($link)); 

    while($row = mysqli_fetch_array($getpid)){
       $pID = $row['pID'];
     // echo $pID;
    }
mysqli_free_result($getpid);

$query ="SELECT * FROM items WHERE pID = '$pID'";

echo "<br>";
// подключаемся к серверу

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<div class=\"table-responsive\" style=\"width:100%;overflow-y:hidden;\"><table class=\"table table-striped table-sm\"><tr><th class=\"col1\">Название товара</th><th class=\"col2\">Описание</th><th class=\"col3\">Цена</th><th class=\"col4\">Количество</th><th></th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr data-item-id='$row[0]'>";
			echo "<td class=\"col0\">$row[1]</td><td class=\"col1\">$row[2]</td><td class=\"col2\">$row[3]</td><td class=\"col3\">$row[4]</td><td><a href='#' class='edit-item'><i class='fa fa-pencil'></i></a></td>";
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
            </div>


            <div class="tab-pane fade" id="storages" role="tabpanel" aria-labelledby="storages-tab">
<?php
function reloadStorage(){ 
    include 'connect.php'; // подключаем скрипт
    $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
    $getpid = mysqli_query($link, "SELECT pID FROM providers WHERE pID = '$_SESSION[id]'") or die("Ошибка " . mysqli_error($link)); 

    while($row = mysqli_fetch_array($getpid)){
       $pID = $row['pID'];
      //echo $pID;
    }
mysqli_free_result($getpid);
$query ="SELECT * FROM storages WHERE pID = '$pID'";

echo "<br>";
// подключаемся к серверу

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<div class=\"table-responsive\" style=\"width:100%;overflow-y:hidden;\"><table class=\"table table-striped table-sm\"><tr><th class=\"col1\">Название</th><th class=\"col2\">Адрес</th><th class=\"col3\">Управление</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
			echo "<td class=\"col0\"><a href=\"/project/storage.php\">$row[1]</a></td><td class=\"col1\">$row[2]</td><td> <a class='storage-edit' href='#' action=''>Редактировать</a></td>";
        echo "</tr>";
    }
    echo "</table></div>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
}
 
 reloadStorage();
?>

            </div>

            <?php 
            include 'connect.php'; // подключаем скрипт
            $connect = mysqli_connect($host, $user, $password, $database) 
                or die("Ошибка " . mysqli_error($connect)); 
                 
            $result = mysqli_query($connect, "SELECT Name,INN,Acc,kAcc,bik,adres,bank FROM providers WHERE uID = '$_SESSION[id]'") or die ("Ошибка ". mysqli_error($connect));

            while($row = mysqli_fetch_array($result)){
               $name = $row['Name'];
               $INN = $row['INN'];
               $Acc = $row['Acc'];
               $kAcc = $row['kAcc'];
               $bik = $row['bik'];
               $adres = $row['adres'];
               $bank = $row['bank'] ;	

              // echo "<p>$name</p><p>$INN</p><p>$Acc</p><p>$kAcc</p><p>$bik</p><p>$adres</p><p>$bank</p>";
            }

            ?>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form method="POST" action="saveprofile.php">
                <div class="form">
                    <div style="display:none;" class="col-12">
                        <label class="col-12 col-md-4 text-right" for="name">pID</label>
                        <input class="col-12 col-md-6" id="pID" name="pID" disbled value="<?php echo $providerID?>" />  
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="name">Наименование</label>
                        <input class="col-12 col-md-6" id="name" name="name" placeholder="Наименование" />  
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="inn">ИНН</label>                  
                        <input class="col-12 col-md-6" id="inn" name="inn" placeholder="ИНН" />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="address">Адрес</label>
                        <input class="col-12 col-md-6" id="address" name="address" placeholder="Адрес"  />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="bik">БИК</label>
                        <input class="col-12 col-md-6" id="bik" name="bik" placeholder="БИК"  />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="Acc">Расчетный счет</label>
                        <input class="col-12 col-md-6" id="Acc" name="Acc" placeholder="Расчетный счет"  />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="kAccr">Кор. счёт</label>
                        <input class="col-12 col-md-6" id="kAcc" name="kAcc" placeholder="Кор. счёт"  />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="bank">Наименование банка</label>
                        <input class="col-12 col-md-6" id="bank" name="bank" placeholder="Наименование банка"  />
                    </div>
                    <br>
                    <button id="save" type="submit" style="float:right;" class="btn btn-primary">Сохранить профиль</button>
                </div>
              </form>  
            </div>


            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
            <?php
function reloadOrders(){ 
    include 'connect.php'; // подключаем скрипт
    $link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
    $getpid = mysqli_query($link, "SELECT pID FROM providers WHERE pID = '$_SESSION[id]'") or die("Ошибка " . mysqli_error($link)); 

    while($row = mysqli_fetch_array($getpid)){
       $pID = $row['pID'];
      //echo $pID;
    }
mysqli_free_result($getpid);
$query ="SELECT * FROM orderslist WHERE pID = '$pID'";

echo "<br>";
// подключаемся к серверу

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<div class=\"table-responsive\" style=\"width:100%;overflow-y:hidden;\"><table class=\"table table-striped table-sm\"><tr><th class=\"col1\">Номер заказа</th><th class=\"col2\">Идентификатор поставщика</th><th class=\"col3\">Общая стоимость</th><th class=\"col3\">Общий объем</th><th class=\"col3\">Адрес доставки</th><th>На карте</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
			echo "<td class=\"col0\"><a href=\"/project/storage.php\">$row[0]</a></td><td class=\"col1\">$row[1]</td><td class=\"col1\">$row[3]</td><td class=\"col1\">$row[4]</td><td class=\"col1\">$row[5]</td><td class=\"map\"><a href=\"#\" class=\"map__marker\">Показать</a></td>";
        echo "</tr>";
    }
    echo "</table></div>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
}
 
 reloadOrders();
?>
<div style="width: 640px; height: 480px" id="mapContainer"></div>
            </div>


        </div>
    </div>
</main>

<script>
    var map;
    var marker;

$(document).ready(function(){

    $('#name').val('<?php echo $name ?>');
    $('#inn').val('<?php echo $INN ?>');
    $('#address').val('<?php echo $adres ?>');
    $('#Acc').val('<?php echo $Acc ?>');
    $('#kAcc').val('<?php echo $kAcc ?>');
    $('#bik').val('<?php echo $bik ?>');
    $('#bank').val('<?php echo $bank ?>');
});

$('.edit-item').on('click', function(){
    var item_id = $(this).parents('tr').attr('data-item-id');
    document.location.href = '/project/item.php?item_id=' + item_id;
});


$('.map__marker').on('click', function(e){
        e.preventDefault();
        
        if (map == null){
        
            var platform = new H.service.Platform({
                app_id: 'nAo325kqe9RfEXGcY7rD',
                app_code: 'it85BIGBamkI4S3Ey7o36A',
                useCIT: true,
                useHTTPS: true
            });
            var defaultLayers = platform.createDefaultLayers();
            
            //Step 2: initialize a map - this map is centered over Europe
            map = new H.Map(document.getElementById('mapContainer'),
                defaultLayers.normal.map,{
                center: {lat:52.5159, lng:13.3777},
                zoom: 14
            });
            // add a resize listener to make sure that the map occupies the whole container
            window.addEventListener('resize', () => map.getViewPort().resize());
            
            //Step 3: make the map interactive
            // MapEvents enables the event system
            // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
            var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
            
            // Create the default UI components
            var ui = H.ui.UI.createDefault(map, defaultLayers);

            marker = new H.map.Marker({
                lat:52.5159, lng:13.3777
            });
            map.addObject(marker);
            var mov = setInterval(function(){
                var _lat = map.getCenter().lat + 0.0005;
                var _lng = map.getCenter().lng + 0.0005;
                marker.setPosition({
                    lat: _lat,
                    lng: _lng
                });
            }, 5000);
        } else {
            map.setCenter({
                lat:52.5159, lng:13.3777
            });
            marker.setPosition({
                lat:52.5159, lng:13.3777
            });
        }
        $('html, body').animate({
            scrollTop: $('#mapContainer').offset().top
        }, 250);
    });

</script>

<?php include ("footer.php") ?>