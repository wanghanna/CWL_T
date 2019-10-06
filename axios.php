<?php
header("Access-Control-Allow-Origin: *");
// session_start();
$db=new PDO("mysql:host=127.0.0.1;dbname=s1080214;charset=utf8","s1080214","s1080214",null);
date_default_timezone_set("Asia/Taipei");
function select($tb,$wh){
  global $db;
  return $db->query("SELECT * FROM ".$tb." WHERE ".$wh)->fetchAll();}
switch($_GET['do']){
  case "p0":
   $rows = select("cwl_plight","1");
  break;
  case "p1":
  $rows = select("cwl_plight","team = 1");
 break;
 case "p2":
 $rows = select("cwl_plight","team = 2");
break;
case "p3":
$rows = select("cwl_plight","team = 3");
break;
case "p4":
$rows = select("cwl_plight","team = 4");
break;
case "p5":
$rows = select("cwl_plight","team = 5");
break;
case "p6":
$rows = select("cwl_plight","team = 6");
break;
case "p7":
$rows = select("cwl_plight","team = 7");
break;
case "p8":
$rows = select("cwl_plight","team = 8");
break;
case "p9":
$rows = select("cwl_plight","team = 9");
break;
case "p10":
$rows = select("cwl_plight","team = 10");
break;
case "p11":
$rows = select("cwl_plight","team = 11");
break;
};
//select
  echo(json_encode($rows));
?>