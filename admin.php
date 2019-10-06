<?php
require_once('sql.php');
if(empty($_SESSION['admin'])) plo("index.php");
$body = (empty($_GET['page'])) ? 'main' : $_GET['page'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link href="./css/font_NotoSansTC.css" rel="stylesheet">

<style>
*{
  font-family: 'Noto Sans TC', sans-serif;
}
#title{
  font-weight:bolder;
  background:#7D8E91;
}

#title a{
  text-decoration:none;
  color:#32302E;
  text-align:center;
  padding:10px;
  transition:0.5s;

}
#title a:hover{
  background:#ebebeb;
  color:#7D8E91;
}
</style>
</head>
<body class="container-fluid row m-0">
  <div id="title" class="col-2 row m-0 p-0 flex-column fixed-top mx-3 vh-100">
<a href="?page=main" class="col d-flex align-items-center justify-content-center"><div>回首頁</div></a>
<a href="?page=light" class="col d-flex align-items-center justify-content-center"><div>光源管理</div></a>
<a href="?page=component" class="col d-flex align-items-center justify-content-center"><div>零組件管理</div></a>
<a href="?page=news" class="col d-flex align-items-center justify-content-center"><div>最新消息管理</div></a>
<button class="col" onclick="document.location.href=('api.php?do=logout')"><div>登出</div></button>
</div>
<div class="col-10 ml-auto">
<?php include_once("a".$body.".php") ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

</body>
</html>
