<?php include ("header.php") ?>

<style>

    .cards{
        display: flex;
    }

        .card {
            width: 30%;
            min-width: 200px;
            height: 30%;
            min-height: 300px;
            display: block;
            background-color: white;
            margin: 0 auto;
            border-radius: 5px;
        }
        
        .card__img{
            background-color: #d9d9d9;
            margin: -1px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            overflow: hidden;
        }

        .card__img img{
            width: 100%;
            height: auto;
        }

        .card__title {
            font-size: 20px;
            padding: 10px 20px;
            font-weight: 500;
        }

        .card__container{
            padding: 0 20px 10px 20px;
        }

        .card__text{
            margin-bottom: 15px;
        }
        .item-count {
            max-width: 50px;
        }
        .item-buy {
            padding:5px;
            font-size:12px;
            background:#007bff;
            color:white;
            border-radius:5px;
        }
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Заказчикам</h1>
    </div>
<div class="">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="items-tab" data-toggle="tab" href="#items" role="tab" aria-controls="items" aria-selected="true">Товары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cart-tab" data-toggle="tab" href="#cart" role="tab" aria-controls="cart" aria-selected="false">Корзина</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">


<div class="tab-pane fade show active" id="items" role="tabpanel" aria-labelledby="home-tab">


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Найти товар</h1>
    </div>
    <div class="cards">
        <div class="card">
            <div class="card__img">
                <img src="/project/apelsin.png">
            </div>
            <div class="card__title">Апельсин</div>
            <div class="card__container">
                <div class="card__text">Хачю опельсин, сладкий опельсин</div>
                <button class="card__btn btn btn-primary">Купить</button>
            </div>
        </div>
        <div class="card">
            <div class="card__img">
                <img src="/project/ananas.png">
            </div>
            <div class="card__title">Ананас</div>
            <div class="card__container">
                <div class="card__text">Хачю ананас, сладкий ананас</div>
                <button class="card__btn btn btn-primary">Купить</button>
            </div>
        </div>
        <div class="card">
            <div class="card__img">
                <img src="/project/olivie.png">
            </div>
            <div class="card__title">Оливье</div>
            <div class="card__container">
                <div class="card__text">Хачю Оливье</div>
                <button class="card__btn btn btn-primary">Купить</button>
            </div>
        </div>
    </div>
    <br>
<br>
    <?php


 
function reload(){ 
include 'connect.php'; // подключаем скрипт
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
     
$query ="SELECT * FROM items";
 echo "<h1>Список доступных товаров</h1>";
echo "<br>";
// подключаемся к серверу

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<div class=\"table-responsive\" style=\"width:100%;overflow-y:hidden;\"><table class=\"table table-striped table-sm\"><tr><th class=\"col0\">ID</th><th class=\"col1\">Название товара</th><th class=\"col2\">Описание</th><th class=\"col3\">Цена</th><th class=\"col4\">Количество</th><th class=\"col5\">Поставщик</th><th class=\"col6\">Покупка</th></tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
			echo "<td class=\"col0\">$row[0]</td><td class=\"col1\">$row[1]</td><td class=\"col2\">$row[2]</td><td class=\"col3\">$row[3]</td><td class=\"col4\">$row[4]</td><td class=\"col5\">$row[5]</td><td class=\"col6\"><input type='text' class='item-count' name='count'> <a class='item-buy' href='#' action=''>Купить</a></td>";
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

<br>
<br>

</div>
<div class="tab-pane fade" id="cart" role="tabpanel" aria-labelledby="home-tab">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Наименование</th>
                <th>Наименование</th>
                <th>Наименование</th>
            </tr>
        <thead>
    </table>
</div>
</div>
</main>

<script>
    var ls = localStorage;
    $(document).ready(function(){
        ls.getItem('cart');
    });

    $(".item-buy").on("click", function(e){
        e.preventDefault();
        var item_id = $(this).parent().parent().children(".col0").text();
        var item_name = $(this).parent().parent().children(".col1").text();        
        var item_count = $(this).parent().parent().children(".col6").children(".item-count").val();
        if (item_count == ""){
            item_count = 1;
        }
        var new_item = ' { "id" : ' + item_id + ', "name" : "' + item_name + '", "count" : ' + item_count + ' } ';
        new_item = JSON.parse(new_item);
        console.log(new_item);
        // var cart = ls.getItem("cart");
        // if (cart = ""){
        //     cart = '{ ' + item + ' }';
        // }
        // console.log(cart);
    });
</script>




<?php include ("footer.php") ?>