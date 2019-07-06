<?php include ("header.php") ?>


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
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Наименование</th>
                            <th>Цена</th>
                            <th>Количество</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>апельсин</td>
                            <td>149 руб</td>
                            <td>1488</td>
                        </tr>
                        <tr>
                            <td>Ананас</td>
                            <td>149 руб</td>
                            <td>1488</td>
                        </tr>
                        <tr>
                            <td>Оливье</td>
                            <td>149 руб</td>
                            <td>1488</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <div class="tab-pane fade" id="storages" role="tabpanel" aria-labelledby="storages-tab">
                <!-- <div style="width: 640px; height: 480px" id="mapContainer"></div> -->

            </div>

            <?php 
            include 'connect.php'; // подключаем скрипт
            $connect = mysqli_connect($host, $user, $password, $database) 
                or die("Ошибка " . mysqli_error($connect)); 
                 
            $result = mysqli_query($connect, "SELECT Name,INN,Acc,kAcc,bik,adres,bank FROM providers WHERE uID = 1") or die ("Ошибка ". mysqli_error($connect));

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
                <div class="form">
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="name">Наименование</label>
                        <input class="col-12 col-md-6" id="name" placeholder="Наименование" />  
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="inn">ИНН</label>                  
                        <input class="col-12 col-md-6" id="inn" placeholder="ИНН" />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="address">Расчётный счёт</label>
                        <input class="col-12 col-md-6" id="address" placeholder="Расчётный счёт"  />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="Acc">БИК</label>
                        <input class="col-12 col-md-6" id="Acc" placeholder="БИК"  />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="kAccr">Кор. счёт</label>
                        <input class="col-12 col-md-6" id="kAcc" placeholder="Кор. счёт"  />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="bank">Наименование банка</label>
                        <input class="col-12 col-md-6" id="bank" placeholder="Наименование банка"  />
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                123
            </div>


        </div>
    </div>
</main>

<script>

$(document).ready(function(){

    $('#name').val('<?php echo $name ?>');
    $('#inn').val('<?php echo $INN ?>');
    $('#address').val('<?php echo $adres ?>');
    $('#Acc').val('<?php echo $Acc ?>');
    $('#kAcc').val('<?php echo $kAcc ?>');
    $('#bik').val('<?php echo $bik ?>');
    $('#bank').val('<?php echo $bank ?>');
});
</script>

<?php include ("footer.php") ?>