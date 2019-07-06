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
        }
        
        .card__img{
            background-color: #d9d9d9;
            margin: -1px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
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
</style>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
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
</main>


<?php include ("footer.php") ?>