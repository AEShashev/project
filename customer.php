<?php include ("header.php") ?>

<link href="cards.css" rel="stylesheet">
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
        <h1 class="h4">Популярные товары</h1>
    </div>
    <div class="cards">
        <div class="card" data-item-id="1" data-item-price="100">
            <div class="card__img">
                <img src="/project/honey.png">
            </div>
            <div class="card__title">Мёд</div>
            <div class="card__container">
                <div class="card__text">Пчёлы старались, мы продаём</div>
                <button class="card__btn btn btn-primary">Купить</button>
                <a href="#" class="card__price">от 100 ₽</a>
            </div>
        </div>
        <div class="card" data-item-id="2" data-item-price="200">
            <div class="card__img">
                <img src="/project/baran.png">
            </div>
            <div class="card__title">Баранина</div>
            <div class="card__container">
                <div class="card__text">Хоть и баран, но быковал</div>
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
    <script>
        $('.searcher input').on('keyup', function(){
            var value = $(this).val().toLowerCase();
            if (value == ""){
                $(".items-table tbody .col1").parents('tr').removeClass('d-none');
                return true;
            }
            $(".items-table tbody .col1").each(function(){
                if ($(this).text().toLowerCase().indexOf(value) >= 0){
                    $(this).parents('tr').removeClass('d-none');
                } else {
                    $(this).parents('tr').addClass('d-none');
                }
            });
        });
    </script>
        <?php


 
function reload(){ 
include 'connect.php'; // подключаем скрипт
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
     
$query ="SELECT * FROM items";
 echo "<h4>Список доступных товаров</h1>";
echo "<br>";
// подключаемся к серверу

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<div class=\"table-responsive items-table\" style=\"width:100%;overflow-y:hidden;\"><table class=\"table table-striped table-sm\"><thead><tr><th class=\"col0\">ID</th><th class=\"col1\">Название товара</th><th class=\"col2\">Описание</th><th class=\"col3\">Цена</th><th class=\"col4\">Количество</th><th class=\"col5\">Поставщик</th><th class=\"col6\">Покупка</th></tr></thead><tbody>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
			echo "<td class=\"col0\">$row[0]</td><td class=\"col1\">$row[1]</td><td class=\"col2\">$row[2]</td><td class=\"col3\">$row[3]</td><td class=\"col4\">$row[4]</td><td class=\"col5\">$row[5]</td><td class=\"col6\"><input type='text' class='item-count' name='count'> <a class='item-buy' href='#' action=''>Купить</a></td>";
        echo "</tr>";
    }
    echo "</thead></table></div>";
     
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
                <h5 class="modal-title" id="orderFormLabel">Введите Ваши данные</h5>
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
                            <label class="col-12 col-md-4 text-right" for="bank_card">Реквизиты банка</label>                  
                            <input class="col-12 col-md-6" id="bank_card" placeholder="Реквизиты" />
                        </div>
                        <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary makeorder">Заказать</button>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="replyLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyLabel">Введите Ваши данные</h5>
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
                            <label class="col-12 col-md-4 text-right" for="bank_card">Реквизиты банка</label>                  
                            <input class="col-12 col-md-6" id="bank_card" placeholder="Реквизиты" />
                        </div>
                        <br>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                <button type="button" class="btn btn-primary makeorder">Заказать</button>
            </div>
            </div>
        </div>
    </div>


</div>

<style>
    .status.g-ready {
        color: orange;
    }

    .status.deliv{
        color: green;
    }

    .status.rides{
        color: blue;
    }
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
                    <td class="status g-ready">Готовится к отправке</td>
                    <td class="map">
                    </td>
                </tr>
                <tr>
                    <td>Мандарины</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути...</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Ананасы</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути...</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Помидоры</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути...</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Рабы</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути...</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Опельсины</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути...</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Мандарины</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути...</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Ананасы</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status rides">В пути...</td>
                    <td class="map">
                        <a class="map__marker" href="#">Показать</a>
                    </td>
                </tr>
                <tr>
                    <td>Помидоры</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status deliv">Доставлено</td>
                    <td class="map">
                </tr>
                <tr>
                    <td>Рабы</td>
                    <td>14</td>
                    <td>1400</td>
                    <td class="status deliv">Доставлено</td>
                    <td class="map">
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
        $("#cart-tab").click();
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
        $("#cart-tab").click();
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