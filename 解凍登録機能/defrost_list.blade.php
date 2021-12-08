<!doctype html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>解凍一覧画面</title>

    <link rel="canonical" href="https://getbootstrap.jp/docs/5.0/examples/dashboard/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

   


    <!-- Bootstrap  core CSS -->
<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  
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
    <link href="/css/defrost.css" rel="stylesheet">
  </head>
  <body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
<div class="text-light ">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3">○○病院</a>
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
        <h6 class="text-primary" style="padding:5px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                メニュー
              </h6>
          <li class="nav-item">

<a class="nav-link" href="#">
  <span data-feather="file"></span>
  入庫
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="defrost_list">
  <span data-feather="shopping-cart"></span>
  解凍
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="dilution_list">
  <span data-feather="users"></span>
  希釈
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="disposal_list">
  <span data-feather="users"></span>
  ワクチン廃棄
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="shipping_list">
  <span data-feather="users"></span>
  出庫予定リスト
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">
  <span data-feather="users"></span>
  履歴
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="reception_read">
  <span data-feather="users"></span>
  受付
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="hospitalinput">
  <span data-feather="users"></span>
  病院登録
</a>
</li>
        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">解凍一覧画面</h1>
        <div id="smartwizard" class="sw-theme-arrows">
        <ul class="nav nav-tabs step-anchor">
        <li class="active"><a>解凍一覧<br><small></small></a></li>
        <li ><a>解凍数登録<br><small></small></a></li>
         <li ><a>解凍登録確認<br><small></small></a></li>
         <li ><a>解凍登録完了<br><small></small></a></li>
        </ul>
      </div>
        
        <div class="btn-toolbar mb-2 mb-md-0">
          
        </div>
    </div>


    <script>

$(function(){

    //印刷
$('.print-btn').on('click', function(){
    var printPage = $(this).closest('.print-page').html();
    $('body').append('<div id="print"></div>');
    $('#print').append(printPage);
    $('body > :not(#print)').addClass('print-off');
    window.print();
    $('#print').remove();
    $('.print-off').removeClass('print-off');
});

   

});
</script>

    
    <div class="m-5">
    </div>
 
    <div class="m-5">
    <div class="text-center">
<div class="d-flex justify-content-center">
    <div class="wrapper">
<div class="print-page">
    <table class="table table-bordered border-dark"  > 
    
    <tbody >
    <tr>
      <th scope="col"class="table-dark border-dark" >品名</th>
      <th scope="col"class="table-dark border-dark">ロット番号</th>
      <th scope="col"class="table-dark border-dark">解凍数(バイアル)</th>
    </tr>
  <tr>
  <td scope="row" class="table-white border-dark" >コミナティ筋注</td>
  <td scope="row" class="table-white border-dark" >FK123456</td>
  <td scope="row" class="table-white border-dark" >10</td>
    </tr>
    <tr>
  <td scope="row" class="table-white border-dark" >コミナティ筋注</td>
  <td scope="row" class="table-white border-dark" >FK124567</td>
  <td scope="row" class="table-white border-dark" >30</td>
    </tr>
    </tbody>
    </table>
    <div class="print-btn btn-info rounded-pill" style="width:200px" >印刷</div>

</div>
</div>
</div>
</div>


<div class="m-5">
    

<form class="row g-15 needs-validation" novalidate>
<div class="text-center">
<div class="d-flex justify-content-center">
<button class="btn btn-success rounded-pill" type="submit" style="width:200px" formaction="/defrost_read" > <h4>解凍登録</h4></button>
  </div>
</div>
    </form>
    </div>
    
  @foreach($item as $items)
    <p>{{$items->hospital_name}}</p>
  @endforeach
  </body>
</html>