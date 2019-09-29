<?php
require_once('sql.php');
$body = (empty($_GET['page'])) ? 'main' : $_GET['page'];
switch ($body) {
  case 'main':
  $zone = "main.php";
  break;
  case 'light':
    $zone = "light.php";
    break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

</head>
<body class="row flex-column align-items-center">
  <div class="bg-secondary p-3 mt-2 badge-pill row container">
  <button class="btn btn-light mx-3" onclick="document.location.href='?page=main'">回首頁</button>
<button class="btn btn-outline-light mr-3" onclick="document.location.href='?page=light'">光源產品管理</button>
<button class="btn btn-outline-light mr-3" onclick="">零組件產品管理</button>
<button class="btn btn-outline-light mr-3" onclick="">最新消息</button>
</div>
<hr />
<?php include_once($zone) ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>
