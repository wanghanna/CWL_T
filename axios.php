<?php
header("Access-Control-Allow-Origin: *");
// session_start();
$db=new PDO("mysql:host=127.0.0.1;dbname=s1080214;charset=utf8","s1080214","s1080214",null);
date_default_timezone_set("Asia/Taipei");
// function
function select($tb,$wh){
  global $db;
  return $db->query("SELECT * FROM ".$tb." WHERE ".$wh)->fetchAll();}
// 判斷式
  if($_GET['do'] == 0){
    $rows = select("cwl_plight","1");
  }
  else{
    $rows = select("cwl_plight","team =".$_GET['do']);
  }

//select
  echo(json_encode($rows));
?>