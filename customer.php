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
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
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
            min-height: 50px;
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

        .total{
            display: flex;
            float: right;
        }

        .summary{
            margin-left: 15px;
        }

        .cart_count{
            background-color: blue;
            border-radius: 50px;
            height: 21px;
            width: 21px;
            display: inline-block;
            padding: 0 6px;
            color: white;
        }

        .card__price{
            float: right;
            height: 38px;
            padding: 9px 0;
        }

        input[type="number"]{
            max-width: 50px;
        }
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Заказчикам</h1>
    </div>
<div class="">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="items-tab" data-toggle="tab" href="#items" role="tab" aria-controls="items" aria-selected="true">Товары</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cart-tab" data-toggle="tab" href="#cart" role="tab" aria-controls="cart" aria-selected="false">Корзина <span class="cart_count d-none"></span></a>
            </li>            
            <li class="nav-item">
                <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">Заказы</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">


<div class="tab-pane fade show active" id="items" role="tabpanel" aria-labelledby="home-tab">


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Популярные товары</h1>
    </div>
    <div class="cards">
        <div class="card" data-item-id="1" data-item-price="100">
            <div class="card__img">
                <img src="/project/apelsin.png">
            </div>
            <div class="card__title">Апельсины</div>
            <div class="card__container">
                <div class="card__text">Хачю опельсин, сладкий опельсин</div>
                <button class="card__btn btn btn-primary">Купить</button>
                <a href="#" class="card__price">от 100 ₽</a>
            </div>
        </div>
        <div class="card" data-item-id="2" data-item-price="200">
            <div class="card__img">
                <img src="/project/ananas.png">
            </div>
            <div class="card__title">Помидоры</div>
            <div class="card__container">
                <div class="card__text">Хачю памидор, сладкий как ананас</div>
                <button class="card__btn btn btn-primary">Купить</button>
                <a href="#" class="card__price">от 200 ₽</a>
            </div>
        </div>
        <div class="card" data-item-id="3" data-item-price="10000">
            <div class="card__img">
                <img src="/project/olivie.png">
            </div>
            <div class="card__title">Рабы</div>
            <div class="card__container">
                <div class="card__text">Хачю Оливье</div>
                <button class="card__btn btn btn-primary">Купить</button>
                <a href="#" class="card__price">от 10000 ₽</a>
            </div>
        </div>
    </div>
    <br>
    <br>


    <div class="searcher">
        <input type="text" placeholder="Поиск товара" />
    </div>
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
<div class="tab-pane fade" id="cart" role="tabpanel" aria-labelledby="cart-tab">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Наименование</th>
                <th>Стоимость</th>
                <th>Количество</th>
                <th>Итого</th>
            </tr>
        <thead>
        <tbody id="tbody">
        </tbody>
    </table>
        <button type="button" id="clear_card" class="btn btn-secondary btn-sm">Очистить корзину</button>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#orderForm" id="neworder">Оформить заказ</button>
        <div class="total">
            <div>Итого:</div>
            <div class="summary"></div>
        </div>

    <!-- Modal -->
    <div class="modal fade" id="orderForm" tabindex="-1" role="dialog" aria-labelledby="orderFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderFormLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">                
                <div class="form">
                        <div class="col-12">
                            <label class="col-12 col-md-4 text-right" for="address">Адрес</label>
                            <input class="col-12 col-md-6" id="address" placeholder="Адрес" />  
                        </div>
                        <div class="col-12">
                            <label class="col-12 col-md-4 text-right" for="bank_card">Номер карты</label>                  
                            <input class="col-12 col-md-6" id="bank_card" placeholder="Номер карты" />
                        </div>
                        <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary">Заказать</button>
            </div>
            </div>
        </div>
    </div>


</div>

<style>

</style>

<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Наименование</th>
                <th>Количество</th>
                <th>Итого</th>
                <th>Статус</th>
                <th>На карте</th>
            </tr>
        <thead>
        <tbody>
            <tbody>
                <tr>
                    <td>Опельсины</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Мандарины</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Ананасы</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Помидоры</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Рабы</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Опельсины</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Мандарины</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Ананасы</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Помидоры</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Рабы</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
            </tbody>
        </tbody>
    </table>
    
    <div style="width: 640px; height: 480px" id="mapContainer"></div>
</div>

</div>

</div>
</main>

<script>
    var ls = localStorage;
    var map;
    var marker;
    $(document).ready(function(){
        var cart = ls.getItem("cart");        
        drawTable(cart);
    });

    $('.map__marker').on('click', function(e){
        e.preventDefault();
        
        if (map ==null){
        
            var platform = new H.service.Platform({ 
                'app_id': 'nAo325kqe9RfEXGcY7rD', 
                'app_code': 'it85BIGBamkI4S3Ey7o36A' 
            }); 


            // Obtain the default map types from the platform object: 
            var defaultLayers = platform.createDefaultLayers(); 

            // Instantiate (and display) a map object: 
            map = new H.Map( 
                document.getElementById('mapContainer'), 
                defaultLayers.normal.map, 
                    { 
                    zoom: 15, 
                    center: { 
                        lat:52.5192,
                        lng:13.4061 
                        } 
                    }
                );

            marker = new H.map.Marker({
                lat:52.5192,
                lng:13.4061
            });
            map.addObject(marker);
            var mov = setInterval(function(){
                var _lat = map.getCenter().lat + 0.0005;
                var _lng = map.getCenter().lng + 0.0005;
                map.setCenter({
                    lat: _lat,
                    lng: _lng
                });
                marker.setPosition({
                    lat: _lat,
                    lng: _lng
                });
            }, 5000);
        } else {
            map.setCenter({
                lat:52.5192,
                lng:13.4061
            });
            marker.setPosition({
                lat:52.5192,
                lng:13.4061
            });
        }
        $('html, body').animate({
            scrollTop: $('#mapContainer').offset().top
        }, 250);
    });

    $('.nav-link#orders-tab').on('click', function(){
    });

    $(".item-buy").on("click", function(e){
        e.preventDefault();
        var item_id = $(this).parent().parent().children(".col0").text();
        var item_name = $(this).parent().parent().children(".col1").text();       
        var item_price = parseInt($(this).parent().parent().children(".col3").text()); 
        var item_count = $(this).parent().parent().children(".col6").children(".item-count").val();
        if (item_count == ""){
            item_count = 1;
        } else {
            item_count = parseInt(item_count);
        }

        addNewItem(item_id, item_name, item_price, item_count);

    });

    function addNewItem(item_id, item_name, item_price, item_count){        
        var cart = ls.getItem("cart");
        if (cart != null){
            var popal = false;
            cart = JSON.parse(cart);
            for (var i = 0; i<cart.item.length; i++){
                if (cart.item[i].id == item_id){
                    cart.item[i].count = parseInt(cart.item[i].count) + item_count;
                    popal = true;
                    break;
                }
            }
            if (!popal){
                var new_item = { "id" : item_id, "name" : item_name, "price" : item_price, "count" : item_count };
                new_item = JSON.stringify(new_item);                
                cart["item"].push(JSON.parse(new_item));
            }
            cart = JSON.stringify(cart);
        } else {
            
            var new_item = { "id" : item_id, "name" : item_name, "price" : item_price, "count" : item_count };
            new_item = JSON.stringify(new_item);
            cart = '{ "item" : [' + new_item + '] }';
        }
        ls.setItem('cart', cart);
        drawTable(cart);
    }

    function drawTable(cart){        
        var table = '';
        var cost = 0;
        var summ = 0;
        if (cart != null){
            var _table = JSON.parse(cart, function(key, value) {
                switch (key){

                    case 'id': 
                        table+='<tr data-item-id="'+value+'">';
                        break;
                    
                    case 'name': 
                        table+='<td class="name">'+value+'</td>';
                        break;
                    
                    case 'price': 
                        table+='<td class="price">'+value+'</td>';
                        cost = value;
                        break;
                    
                    case 'count': 
                        table+='<td class="count"><input type="number" value="'+value+'" /><a href="#" class="delete-item"><i class="fa fa-times"></i></a></td><td class="summ">'+(value*cost)+'</td></tr>';
                        summ+=value*cost;
                        break;

                    default:
                        break;

                }
            });
        }
        $("#tbody").html(table);
        $(".summary").text(summ);
        
        if (cart != null){            
            if (JSON.parse(cart).item.length > 0){
                $(".cart_count").text(JSON.parse(cart).item.length).removeClass('d-none');
            }
        } else {
            $(".cart_count").text('0').addClass('d-none');
        }
    }

    $(".card__btn").on('click', function(){
        var item_id = $(this).parents('.card').attr('data-item-id');
        var item_price = $(this).parents('.card').attr('data-item-price');
        var item_name = $(this).parents('.card').children('.card__title').text();
        var item_count = 1;
        addNewItem(item_id, item_name, item_price, item_count);
    });

    $("#clear_card").on('click', function(){
        ls.removeItem('cart');
        drawTable(null);
    });

    $(document).on('click', '.delete-item', function(e){
        e.preventDefault();
        var cart = ls.getItem("cart");
        cart = JSON.parse(cart);
        if (cart == null){
            return false;
        } else {
            var item_id = parseInt($(this).parents("tr").attr('data-item-id'));
            var _cart ='{"item" : [';
            if (cart.item.length == 1){
                _cart = null;
            } else {
                for (var i = 0; i<cart.item.length; i++){
                    if (cart.item[i].id != item_id){
                        _cart+=JSON.stringify(cart.item[i]) +',';
                    }
                }
                _cart = _cart.slice(0, _cart.length - 1) + '] }';
            }
        }
        cart = _cart;
        if (cart!=null){
            ls.setItem('cart', cart);
        } else {            
            ls.removeItem('cart');
        }
        drawTable(cart);
    });

    $(document).on('change','input[type="number"]',function(){        
        var cart = ls.getItem("cart");
        cart = JSON.parse(cart);
        var item_id = $(this).parents('tr').attr('data-item-id');
        var item_name = $(this).parents('tr').children('.name').text();
        var item_price = $(this).parents('tr').children('.price').text();
        var item_count = $(this).val();
        if (item_count == 0){
            $(this).parents('tr').children('.count').children('.delete-item').click();
            return true;
        }
        for (var i = 0; i<cart.item.length; i++){
            if (cart.item[i].id == item_id){
                cart.item[i].count = item_count;
            }
        }
        cart = JSON.stringify(cart);
        ls.setItem('cart', cart);
        drawTable(cart);
    });
</script>


<script type="text/jаvascript" >
        $(document).ready(function() {
            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });
    </script>


<?php include ("footer.php") ?>