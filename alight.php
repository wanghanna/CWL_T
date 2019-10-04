<?php
if(!empty($_GET['do'])&&$_GET['do']=="add"){
  $sql="INSERT INTO cwl_plight (date) VALUES(NOW())";
  $db->query($sql);
  $max=getmax();
  header("location:?page=light&p=".$max);
}
if(!empty($_POST)&&is_array($_POST['name'])){
  foreach ($_POST['name'] as $key => $value) { 
    $chg="";
    if($_POST['team'][$key]!=$_POST['oldteam'][$key]) $chg.="team='".$_POST['team'][$key]."', ";
    if($_POST['type'][$key]!=$_POST['oldtype'][$key]) $chg.="type='".$_POST['type'][$key]."', ";
    if($_POST['name'][$key]!=$_POST['oldname'][$key]) $chg.="name='".$_POST['name'][$key]."', ";
    if($_POST['des'][$key]!=$_POST['olddes'][$key]) $chg.="des='".$_POST['des'][$key]."', ";
    if($chg){ //必須要是非空字串
      $sql="UPDATE cwl_plight SET ".$chg."date=NOW() WHERE id=".$key;
      $db->query($sql);
    }
  }
  header("location:?page=light&p=".$_GET['p']);
}

if(!empty($_GET['del'])){ 
  $sql="DELETE FROM cwl_plight WHERE id=".$_GET['del'];
  $db->query($sql);
  $max=getmax();
  $realp=($_GET['p']-$max==1)?$max:$_GET['p'];
  header("location:?page=light&p=".$realp);
}
if(!empty($_GET['p'])){
  $nowpage=($_GET['p']>0&&(is_numeric($_GET['p'])))?$_GET['p']:1;
}
else {
  $nowpage=1;
}

$begin=($nowpage-1)*5;  // used +-*/ get a value
$sql="SELECT * FROM cwl_plight WHERE 1 LIMIT ".$begin.",5";
$rows=$db->query($sql)->fetchAll();
//select end

?>
<style>
td{
font-family:"微軟正黑體";
padding-left:10px;
text-align:center;}
</style>
<div class="container">
<table width=100% class="shadow rounded" id="dt">
<tr>
  <td>編號</td>
  <td>產品圖片</td>
  <td>產品組別(數字)</td>
  <td>產品類別</td>
  <td>產品名稱</td>
  <td>產品資訊</td>
  <td>更新日期</td>
  <td>操作</td>
</tr>
<tr><td colspan="6"><hr/></td></tr>
<form method="post" action="?page=light&p=<?=$_GET['p']?>"><!-- 修改表單 start-->
<?php
foreach($rows as $row){
?>
<tr>
  <td><?=$row['id']?></td>
  <td>
  <img src="upload/<?=$row['pic']?>" width=100 height=100></td>
  <td>
    <input type="hidden" name="oldteam[<?=$row['id']?>]" value="<?=$row['team']?>">
    <input type="text" name="team[<?=$row['id']?>]" value="<?=$row['team']?>">
  </td>
  <td>
    <input type="hidden" name="oldtype[<?=$row['id']?>]" value="<?=$row['type']?>">
    <input type="text" name="type[<?=$row['id']?>]" value="<?=$row['type']?>">
  </td>
  <td>
    <input type="hidden" name="oldname[<?=$row['id']?>]" value="<?=$row['name']?>" min=1>
    <input type="text" name="name[<?=$row['id']?>]" value="<?=$row['name']?>" min=1>
  </td>
  <td>
    <input type="hidden" name="olddes[<?=$row['id']?>]" value="<?=$row['des']?>" style="width:95%">
    <input type="text" name="des[<?=$row['id']?>]" value="<?=$row['des']?>" style="width:95%">
  </td>
  <td><?=$row['date']?></td>
  <td>
    <input type="button" value="x" onclick="document.location.href='?page=light&del=<?=$row['id']?>&p=<?=$nowpage?>'">
  </td>
</tr>
<?php
}
?>
<tr>
  <td colspan=6 align=center>
    <hr/>
<?php

$max=getmax();

if($nowpage!=1) echo ' <a href="?page=light&p='.($nowpage-1).'"><<</a> ';

for($i=1;$i<=$max;$i++) {
  if($nowpage==$i) echo ' <span style="font-size:2em">'.$i.'</span> ';
  else echo ' <a href="?page=light&p='.$i.'">'.$i.'</a> ';
}

//$nextpg=($nowpage==$max)?$nowpage:$nowpage+1; //下一頁
if($nowpage!=$max) echo ' <a href="?page=light&p='.($nowpage+1).'">>></a> ';
?>
    <p>
      <!-- <input type="button" value="新增一筆" onclick="location.href='?page=light&do=add'"> -->
      <input type="button" value="新增一筆" onclick="location.href='?page=light&do=add'">
      <input type="submit" value="全部更新">
    </p>
  </td>
</tr>
</form><!-- 修改表單 end-->
</table>
</div>
