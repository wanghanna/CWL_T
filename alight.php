<?php
require_once('sql.php');
?>
<style>
td{
padding:10px;
text-align:center;
font-size:15px;
}
</style>
<div class="text-center" style="background:#ebebeb;box-shadow:inset 0 0 10px white">
<form method="post" action="api.php?do=lightmdy">
<table style="width:90%;" align="center">
<thead>
<td colspan="2"><h3>光源產品管理</h3></td>
</thead>
<tbody>
<tr>
  <td><input type="button" value="新增資料" onclick=<?=jlo('view.php?do=lightadd') ?>></td>
  <td class="text-right"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
</tr>
</tbody>
</table>
<table width=90% align="center" class="shadow rounded mb-5" style="background:#F8F9FA">
<tbody>
<tr>
  <td>產品圖片</td>
  <td>產品組別(數字)</td>
  <td>產品類別</td>
  <td>產品名稱</td>
  <td>產品資訊</td>
  <td>刪除</td>
  <td></td>
</tr>
<tr><td colspan="6"><hr/></td></tr>
<?php
$rows =  select("cwl_plight",1);
foreach($rows as $row){
?>
<tr>
<!-- 照片 -->
  <td><img src="upload/<?=$row['pic']?>" width=200vw ></td>
  <!-- 組別 -->
  <td><input type="text" name="team[<?=$row['id']?>]" value="<?=$row['team']?>"></td>
  <!-- 類別 -->
  <td><input type="text" name="type[<?=$row['id']?>]" value="<?=$row['type']?>"></td>
  <!-- 名稱 -->
  <td><input type="text" name="name[<?=$row['id']?>]" value="<?=$row['name']?>" min=1></td>
  <!-- 說明 -->
  <td>
  <textarea name="des[<?=$row['id']?>]" cols="35" rows="5"><?=$row['des']?></textarea>
  </td>
  <!-- 刪除 -->
  <td><input type="checkbox" name="del[]" value="<?=$row['id'] ?>"></td>
<form method="post" action="view.php?do=lightchg"><td>更新圖片<input type="submit" name="chg" value="<?=$row['id']?>"></td></form>
</tr>
<?php
}
?>
</tbody>
</table>
</form>
</div>
