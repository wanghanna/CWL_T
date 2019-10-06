<?php
require_once('sql.php');
// 總共幾筆資料
if(!empty($_GET['team'])){
  $hm = dhm('cwl_plight',$_GET['team']);
}
else{$hm = hm('cwl_plight');}
//分頁
if(!empty($_GET['p'])){
  $nowpage=($_GET['p']>0&&(is_numeric($_GET['p'])))?$_GET['p']:1;
}
else {
  $nowpage=1;
}
$many = 5;
$begin=($nowpage-1)*$many;  // used +-*/ get a value
if(!empty($_GET['team'])){
  $sql="SELECT * FROM cwl_plight WHERE team='".$_GET['team']."' LIMIT ".$begin.",$many";
}
else {$sql="SELECT * FROM cwl_plight WHERE 1 LIMIT ".$begin.",$many";}
$rows=$db->query($sql)->fetchAll();
$endpage = $hm-$begin;
if( $endpage <= 5){
  $endpage = $hm;
}
else {$endpage = ($begin+5);}
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
.styleT{
  border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
}
</style>
<body class="vw-100" style="position:relative">
<div class="text-center" style="background:#ebebeb;box-shadow:inset 0 0 10px white;position:relative">
<form method="post" action="api.php?do=lightmdy">
<div class="sticky-top bg-dark row m-0 justify-content-between p-3">
<div><input class="btn btn-secondary" type="button" value="新增資料" onclick=<?=jlo('view.php?do=lightadd') ?>></div>
<!-- 頁碼 -->
<div>
<?php
if(!empty($_GET['team'])){
  $max=dmax('cwl_plight',$_GET['team']);
  if($nowpage!=1) echo ' <a href="?page=light&team='.$_GET['team'].'&p='.($nowpage-1).'"><<</a> ';

for($i=1;$i<=$max;$i++) {
  if($nowpage==$i) echo ' <span style="font-size:2em">'.$i.'</span> ';
  else echo ' <a href="?page=light&team='.$_GET['team'].'&p='.$i.'">'.$i.'</a> ';
}

if($nowpage!=$max) echo ' <a href="?page=light&team='.$_GET['team'].'&p='.($nowpage+1).'">>></a> ';
}
else{$max=getmax('cwl_plight');
if($nowpage!=1) echo ' <a href="?page=light&p='.($nowpage-1).'"><<</a> ';

for($i=1;$i<=$max;$i++) {
  if($nowpage==$i) echo ' <span style="font-size:2em">'.$i.'</span> ';
  else echo ' <a href="?page=light&p='.$i.'">'.$i.'</a> ';
}
if($nowpage!=$max) echo ' <a href="?page=light&p='.($nowpage+1).'">>></a> ';
}
?>
</div>
<!-- 頁碼end -->
<div class="btn-group">
<input class="btn btn-secondary" type="submit" value="修改確定">
<input class="btn btn-secondary" type="reset" value="重置">
</div>
</div>
<table style="width:100%" align="center" class="shadow rounded mb-5" style="background:#F8F9FA;">
<thead class="">
<tr class="bg-info">
  <th colspan="1"><h5>第<?= $begin+1 ?>-<?= $endpage ?>筆</h5></th>
  <th colspan="4"><h3>光源產品管理</h3></th>
  <th colspan="1"><h5>每頁顯示:<?= $many ?>筆</h5></th>
  <th colspan="1"><h5>共<?= $hm ?>筆資料</h5></th>
  
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
// $rows =  select("cwl_plight",1);
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
<div>
<hr class="styleT">
</form>
</div>
</body>
