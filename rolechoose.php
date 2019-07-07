<?php include ("header.php") ?>
<link href="cards.css" rel="stylesheet">
<style>
    .card{cursor:pointer;}
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

  
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Выбор роли</h1>
    </div>

    <div class="cards">


        <div class="card" data-item-id="1" data-item-price="100">
            <div class="card__img">
                <img src="/project/shop.png">
            </div>
            <div class="card__title">Заказчик</div>
            <div class="card__container">
                <div class="card__text">Я хочу купить товар</div>
            </div>
        </div>


        <div class="card" data-item-id="1" data-item-price="100">
            <div class="card__img">
                <img src="/project/provider.png">
            </div>
            <div class="card__title">Поставщик</div>
            <div class="card__container">
                <div class="card__text">Я хочу продать товар</div>
            </div>
        </div>
        

        <div class="card" data-item-id="1" data-item-price="100">
            <div class="card__img">
                <img src="/project/tesla.png">
            </div>
            <div class="card__title">Перевозчик</div>
            <div class="card__container">
                <div class="card__text">Я могу доставить товар</div>
            </div>
        </div>


    </div>
    <button class="btn btn-info my-5 mx-3" style="float: right;">Продолжить</button>
    <script>
        $(".card").on('click', function(){
            $(this).toggleClass('active');
        });
    </script>

</main>


<?php include ("footer.php") ?>