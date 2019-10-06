<?php
require_once('sql.php');
?>
<style>
td{
padding:5px;
text-align:center;
font-size:15px;
}
th{
  padding:20px 0;
}
</style>
<body class="vw-100" style="position:relative">
<div class="text-center" style="background:#ebebeb;box-shadow:inset 0 0 10px white;position:relative">
<form method="post" action="api.php?do=lightmdy">
<div class="sticky-top bg-dark row m-0 justify-content-between p-3">
<div><input class="btn btn-secondary" type="button" value="新增資料" onclick=<?=jlo('view.php?do=lightadd') ?>></div>
<div class="btn-group">
<input class="btn btn-secondary" type="submit" value="修改確定">
<input class="btn btn-secondary" type="reset" value="重置">
</div>
</div>
<table style="" align="center" class="shadow rounded mb-5" style="background:#F8F9FA;">
<thead class="">
<tr class="bg-info">
  <th colspan="7"><h3>光源產品管理</h3></th>
</tr>
<tr>
  <th>產品圖片</th>
  <th>產品組別<br>(數字)</th>
  <th>產品類別</th>
  <th>產品名稱</th>
  <th>產品資訊</th>
  <th><span class="badge badge-pill badge-danger">刪除</span></th>
  <th><span class="badge badge-pill badge-warning">更新圖片</span></th>
</tr>
</thead>
<tbody>
<tr><td colspan="7"><hr/></td></tr>
<?php
$rows =  select("cwl_plight",1);
foreach($rows as $row){
?>
<tr>
<!-- 照片 -->
  <td width="20%"><img src="upload/<?=$row['pic']?>" width=100vw ></td>
  <!-- 組別 -->
  <td><input type="text" name="team[<?=$row['id']?>]" value="<?=$row['team']?>" size="1%"></td>
  <!-- 類別 -->
  <td><input type="text" name="type[<?=$row['id']?>]" value="<?=$row['type']?>" size="15%"></td>
  <!-- 名稱 -->
  <td><input type="text" name="name[<?=$row['id']?>]" value="<?=$row['name']?>" size="20%"></td>
  <!-- 說明 -->
  <td>
  <textarea name="des[<?=$row['id']?>]" cols="35" rows="5"><?=$row['des']?></textarea>
  </td>
  <!-- 刪除 -->
  <td width="10%"><input type="checkbox" name="del[]" value="<?=$row['id'] ?>"></td>
<form method="post" action="view.php?do=lightchg"><td width="10%">更新圖片<input type="submit" name="chg" value="<?=$row['id']?>"></td></form>
</tr>
<?php
}
?>
</tbody>
</table>
</form>
</div>
</body>
