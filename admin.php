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
  <script src="./js/js.js"></script>
<style>
*{
  font-family: 'Noto Sans TC', sans-serif;
}
</style>
</head>
<body class="row flex-column align-items-center">
  <div class="my-1 bg-light row m-0 p-0 container justify-content-between">
<a href="?page=main" class="col bg-light px-3 py-1 text-center text-decoration-none">回首頁</a>
<a href="?page=light" class="col bg-light px-3 py-1 text-center text-decoration-none">光源管理</a>
<a href="?page=component" class="col bg-light px-3 py-1 text-center text-decoration-none">零組件管理</a>
<a href="?page=news" class="col bg-light px-3 py-1 text-center text-decoration-none">最新消息管理</a>
<button class="col btn btn-outline-warning mr-3 text-center decoration" onclick="document.location.href=('api.php?do=logout')">登出</button>
</div>
<hr />
<?php include_once("a".$body.".php") ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>
