<!-- 病院情報一覧画面 -->

<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>病院情報一覧画面</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    

    <!-- Bootstrap core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.js" integrity="sha256-tcqPYPyxU+Fsv5sVdvnxLYJ7Jq9wWpi4twZbtZ0ubY8=" crossorigin="anonymous"></script> 


<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="/css/hospitalregister.css" rel="stylesheet">


  </head>
  <body>
  <script>
bootbox.alert("未登録の病院があります!");

</script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
<div class="text-light ">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3">管理者画面</a>
    </div>
  <ul class="nav pull-right">
  <li class="nav-item">
      <a class="nav-link text-white" href="#">ホーム</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white"href="#">サインアウト</a>
    </li>
  </ul>
</header>


<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page">
              <span data-feather="home"></span>
              メニュー
            </a>
          </li>
          <li class="nav-item">

            <a class="nav-link" href="/test/errorPrint">
              <span data-feather="file"></span>
              入庫
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              
              出庫
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              履歴
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              受付
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              在庫閲覧
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              病院登録
            </a>
          </li>

       
        
      </div>
    </nav>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">病院情報一覧画面</h1>
        <button type="button" class="btn btn-info rounded-pill " style="width:150px" ><h4>病院登録</h4></button>

        
        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div>
    </div>

    <div class="m-5">
    <table class="table table-bordered border-dark" > 
    
    <tbody >
    <tr>
      <th scope="col"class="table-dark border-dark">ID</th>
      <th scope="col"class="table-dark border-dark">病院名</th>
      <th scope="col"class="table-dark border-dark">住所</th>
      <th scope="col"class="table-dark border-dark">電話番号</th>
      <th scope="col"class="table-dark border-dark">緯度・経度</th>
      <th scope="col"class="table-dark border-dark">削除・編集</th>
    </tr>
  <tr>
  <td scope="row" class="table-white border-dark" >H0001</td>
  <td scope="row" class="table-white border-dark" >広島県立病院</td>
  <td scope="row" class="table-white border-dark" >広島県広島市南区宇品神田１丁目５−番５４号</td>
  <td scope="row" class="table-white border-dark" >082-254-1818</td>
  <td scope="row" class="table-white border-dark" >34.366952,132.466509</td>
  <td scope="row" class="table-white border-dark" style="width:150px"> <button type="button" class="btn btn-white border border-primary" style="width:60px" >   <div class="text-primary">編集</div></button>
  <button type="button" class="btn btn-white border border-danger" style="width:60px" >   <div class="text-danger">削除</div></button></td>
    </tr>  

  <tr>
  <td scope="row" class="table-white border-dark" >H0002</td>
  <td scope="row" class="table-white border-dark" >広島県国立病院</td>
  <td scope="row" class="table-white border-dark" >広島県広島市中区八丁堀１丁目５−番５４号</td>
  <td scope="row" class="table-white border-dark" >082-244-1818</td>
  <td scope="row" class="table-white border-dark" >34.364552,132.466509</td>
  <td scope="row" class="table-white border-dark" style="width:150px"> <button type="button" class="btn btn-white border border-primary" style="width:60px" >   <div class="text-primary">編集</div></button>
  <button type="button" class="btn btn-white border border-danger" style="width:60px" >   <div class="text-danger">削除</div></button></td>
    </tr>
  

    </tbody>
</table>

<div class="m-5">
    </div>

<form class="row g-4 needs-validation" novalidate>
<div class="text-center">
<div class="d-flex justify-content-center">



  

  <button type="button" class="btn btn-danger rounded-pill " style="width:90px" onclick="history.back(-1)"><h4>戻る</h4></button>
    </div>
</div>

    </form>


    

    

  


    
    <script src="{{ asset('/js/hospitalregister.js') }}"></script>

      
    </div>
  </body>
</html>