<?php
require_once('sql.php');
switch ($_GET['do'])
{
  case 'check': 
  $re=select("cwl_admin","acc='".$_POST['acc']."' and pwd='".$_POST['pwd']."'");     
  if($re){
  $_SESSION['admin']="login";
  plo('admin.php');
  }
  else echo "<script>alert('帳號或密碼錯誤');".jlo("index.php")."</script>";
  break;
  case 'logout':
  unset($_SESSION['admin']);
  plo('http://220.128.133.15/s1080214/project/dist/#/');
  break;
}

?>