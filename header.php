<!DOCTYPE html>
<html>
<head>
<title>MBT</title> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>

<style>
    nav{
        background-color: #1E3D6B !important;
    }

    .navbar-brand{
        background-color: #1E3D6B !important;
        box-shadow: none !important;
        padding: 5px .75rem;
    }

    .navbar-brand #logo{
        display: block;
        height: 65px;
    }
    .navbar-brand #logo_dark{
        display: none;
        height: 65px;
    }
    .navbar-brand:hover #logo{
        display: none;
    }
    .navbar-brand:hover #logo_dark{
        display: block;
    }

    .sidebar-sticky{
        padding-top: 45px !important;
    }

    
    .sign-out #sign_out{
        display: block;
    }

    .sign-out #sign_out_dark{
        display: none;
    }

    .sign-out:hover #sign_out{
        display: none;
    }
    
    .sign-out:hover #sign_out_dark{
        display: block;
    }

    body{
        background-color: white;
    }

    .bg-light{
        background-color: white !important;
        box-shadow: none !important;
    }

      .bd-placeholder-img, .bd-placeholder-img .poshelnahui {
        font-size: 1.125rem;
        text-anchor: middle;
      }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      footer {
        position:fixed;
        bottom:0px;
        height:20px;
        background:#343a40;
        z-index:101;
        width:100%;
        text-align:right; 
        color:grey;
      }

      .container-fluid{
          margin-bottom: 100px;
          margin-top: 40px;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/project/index.php">
        <img id="logo" src="/project/logo.png">        
        <img id="logo_dark" src="/project/logo_dark.png">
    </a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link sign-out" href="#">
                <img id="sign_out" src="/project/exit.png" height="40px">                
                <img id="sign_out_dark" src="/project/exit_dark.png" height="40px">
            </a>
        </li>
    </ul>
</nav>


<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="/project/index.php">
              <span data-feather="home"></span>
              Главная
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/project/customer.php">
              <span data-feather="file"></span>
              Заказчикам
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/project/provider.php">
              <span data-feather="shopping-cart"></span>
              Поставщикам
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/project/carrier.php">
              <span data-feather="users"></span>
              Перевозчикам
            </a>
          </li>
        </ul>
      </div>
    </nav>
