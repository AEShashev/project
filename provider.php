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

            </div>


            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="form">
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="name">Наименование</label>
                        <input class="col-12 col-md-6" id="name" placeholder="Наименование" value="Рога и копыта" />  
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="inn">ИНН</label>                  
                        <input class="col-12 col-md-6" id="inn" placeholder="ИНН" value="14881488" />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="address">Расчётный счёт</label>
                        <input class="col-12 col-md-6" id="address" placeholder="Расчётный счёт" value="32283228" />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="account">БИК</label>
                        <input class="col-12 col-md-6" id="account" placeholder="БИК" value="12345678" />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="bank_number">Банковский счёт</label>
                        <input class="col-12 col-md-6" id="bank_number" placeholder="Банковский счёт" value="5469000000000000" />
                    </div>
                    <div class="col-12">
                        <label class="col-12 col-md-4 text-right" for="bank">Наименование банка</label>
                        <input class="col-12 col-md-6" id="bank" placeholder="Наименование банка" value="БАНКОБАНК" />
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                123
            </div>
        </div>
    </div>
</main>


<?php include ("footer.php") ?>