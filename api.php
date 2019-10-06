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
  //新增光源產品
  case 'lightadd':
  $_POST['pic'] = addfile($_FILES['img']);
  $_POST['date'] = date("Y-m-d H:i:s");
  insert($_POST,"cwl_plight");
  // print_r($_POST);
  $max=getmax('cwl_plight');
  plo('admin.php?page=light&p='.$max);
  break;
  case 'lightmdy':
  // print_r($_POST);
  update($_POST,"cwl_plight");
  delete($_POST,"cwl_plight");
  plo("admin.php?page=light");
  break;
// 更新圖片
case 'lightchg':
  $_POST['pic'][$_GET['id']] = addfile($_FILES['img']);
  update($_POST,"cwl_plight");
  plo("admin.php?page=light");
  print_r($_POST);

  break;



  case 'xxx':
  print_r($_POST);
  print_r($_GET);
  print_r($_FILES);
  break;
}

?>