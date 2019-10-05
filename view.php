<?php
require_once('sql.php');
switch($_GET['do']){
    case 'lightadd':
    ?>
    <div id="close" onclick="window.history.go(-1)"></div>
	<form method="post" action="api.php?do=<?= $_GET['do'] ?>" enctype="multipart/form-data">
    <div class="text-center">
    <p class="text-center">新增光源產品區</p>
    <hr class="styleT">
     <table width="100%" class="">
         <tr>
             <td>光源產品照片</td>
             <td><input name="img" type="file"></td>
         </tr>
         <tr>
             <td>組別</td>
             <td><input name="team" type="text"></td>
         </tr>
         <tr>
             <td>類別</td>
             <td><input name="type" type="text"></td>
         </tr>
         <tr>
             <td>產品名稱</td>
             <td><input name="name" type="text"></td>
         </tr>
         <tr>
             <td>說明</td>
             <td>
             <textarea name="des" cols="30" rows="10"></textarea>
         </tr>
     </table>
    <p class="mt-5">	
        <input class="btn btn-secondary mx-2" value="新增" type="submit">
        <input type="reset" class="btn btn-outline-danger mx-2" value="重置">
    </p>
    </div>
</form>
<?php
break;
case 'lightchg':
?>
    <div id="close" onclick="window.history.go(-1)"></div>
	<form method="post" action="api.php?do=<?= $_GET['do'] ?>&id=<?=$_POST['chg']?>" enctype="multipart/form-data">
    <div class="text-center">
    <p class="text-center">修改圖片</p>
    <hr class="styleT">
     <table width="100%" class="">
         <tr>
             <td>光源產品照片</td>
             <td><input name="img" type="file"></td>
         </tr>
     </table>
    <p class="mt-5">	
        <input class="btn btn-secondary mx-2" value="修改" type="submit">
        <input type="reset" class="btn btn-outline-danger mx-2" value="重置">
    </p>
    </div>
</form>
<?php
break;
}
?>



<!-- 樣式列表 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<style>
    #close{
        background:#FF1493;
        width:50px;
        height:50px;
        position:absolute;
        border-radius:45%;
        right:30px;
        top:20px;
        font-size:30px;
        text-align:center;
        transition:10s;
    }
    #close:hover{
        transform:rotateZ(360deg) translate(-1%, -2%);
    }
hr.styleT {
border: 0;
    height: 1.2px;
    background-image: linear-gradient(to right, transparent, #7C7B79, transparent);
}
td:nth-child(1){
    width:150px;
    height:50px;
    text-align:end;
}
</style>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>