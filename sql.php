<?php
$db = new PDO("mysql:host=127.0.0.1;dbname=s1080214;charset=utf8", "s1080214", "s1080214", null);
date_default_timezone_set("Asia/Taipei");

function plo($link){
  return header("location:".$link);
}

function jlo($link){
  return "location.href='".$link."'";
}

function select($tb, $wh){
  global $db;
  return $db->query("select * from " . $tb . " where " . $wh)->fetchAll();
}

function getmax(){
  global $db; 
  $row=$db->query("select COUNT(*) from cwl_plight where 1")->fetch();
  return ceil($row[0]/5);
}
?>