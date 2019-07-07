
<style>
  .g {    
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    width: 30%;
    margin: 0 15px 30px 15px;
    text-align: center;
    font-weight: 600;
    font-size: 16px;
    padding: 15px;
  }

  .g:hover{
    box-shadow: 0 2px 5px 0 rgba(0,0,255,.4), 0 2px 10px 0 rgba(0,0,255,.4);
    cursor: pointer;
  }
</style>

<?php include ("header.php") ?>
<div class="container-fluid">
  <div class="row">
   
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Главная</h1>
      </div>
      <div class="d-flex">
        <div class="g">
          <img src="/project/o_companii.png">
          <div class="g-text">О компании</div>
        </div>
        <div class="g">
          <img src="/project/nastroyki.png">
          <div class="g-text">Профиль</div>
        </div>
        <div class="g">
          <img src="/project/gruz.png">
          <div class="g-text">Каталог грузоперевозчиков</div>
        </div>
        <div class="g">
          <img src="/project/postavchik.png">
          <div class="g-text">Каталог поставщиков</div>
        </div>
</div><div class="d-flex">
        <div class="g">
          <img src="/project/zakazchik.png">
          <div class="g-text">Каталог заказчиков</div>
        </div>
        <div class="g">
          <img src="/project/pravilaaa.png">
          <div class="g-text">Правила пользования</div>
        </div>
        <div class="g">
          <img src="/project/qr.png">
          <div class="g-text">Сканировать QR-code</div>
        </div>
        <div class="g">
          <img src="/project/teh_pomosh.png">
          <div class="g-text">Техподдержка</div>
        </div>
      </div>
    </main>
  </div>
</div>
<?php include ("footer.php")?>
