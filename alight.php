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
#pg a{
  text-decoration:none;
  color:#343A40;
  transition:0.5s;
}
#pg a:hover{
  text-decoration:none;
  color:#ebebeb;
  font-size:2rem;
}

</style>
<body style="position:relative">
<div class="text-center" style="background:#ebebeb;box-shadow:inset 0 0 10px white;position:relative">
<form method="post" action="api.php?do=lightmdy">
<div class="row m-0 flex-column">
<div class="row m-0 justify-content-between p-2 bg-info">  
  <h3 class="text-light">光源產品管理</h3>
  
<!-- 頁碼 -->
<div id="pg" class="col mr-auto text-light">
<span class="text-light mx-2">頁碼</span>
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

  <h5 class="mx-2">第<?= $begin+1 ?>-<?= $endpage ?>筆</h5>
  <h5 class="mx-2">每頁顯示:<?= $many ?>筆</h5>
  <h5 class="mx-2">共<?= $hm ?>筆資料</h5>
</div>
<div class="sticky-top bg-dark row m-0 justify-content-between p-3">
<div><input class="btn btn-secondary" type="button" value="新增資料" onclick=<?=jlo('view.php?do=lightadd') ?>></div>

<!-- 輸入產品組別 -->
<div class="my-2">
<span class="text-info">組別:</span>
<input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light'" value="全部顯示">
<input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light&team=1'" value="1">
<input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light&team=2'" value="2">
<input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light&team=3'" value="3">
<input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light&team=4'" value="4">
<input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light&team=5'" value="5">
<input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light&team=6'" value="6">
<input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light&team=7'" value="7">
<input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light&team=8'" value="8">
<!-- <input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light&team=9'" value="9">
<input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light&team=10'" value="10">
<input class="btn btn-info m-1" type ="button" onclick="location.href='?page=light&team=11'" value="11"> -->
</div>

<div class="btn-group">
<input class="btn btn-secondary" type="submit" value="修改確定">
<input class="btn btn-secondary" type="reset" value="重置">
</div>
</div>
</div>
<table style="width:100%" align="center" class="shadow rounded mb-5" style="background:#F8F9FA;">
<thead>
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
