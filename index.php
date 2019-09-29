<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body class="vw-100 vh-100 row justify-content-center align-items-center">
	<div class="container row justify-content-center bg-light h-50 align-items-center shadow-lg">
	<form method="post" action="api.php?do=check">
					<p>管理員登入區</p>
					<div class="form-group">
    <label for="exampleInputPassword1">Account</label>
    <input name="acc" type="text" class="form-control" id="exampleInputPassword1" placeholder="name">
  </div>
					<div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name="pwd" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
					<p><input class="btn btn-secondary mx-3" value="送出" type="submit"><input type="reset" class="btn btn-outline-danger" value="清除"></p>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>
