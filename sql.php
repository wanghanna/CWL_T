<?php
SESSION_start();
$db = new PDO("mysql:host=127.0.0.1;dbname=s1080214;charset=utf8", "root", "", null);
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

function  insert($ary,$tb){
  global $db;
  $field = "id";
  $data = "null";
  foreach($ary as $key => $value){
    $field .= "," . $key;
    $data .= ",'" . $value."'";
  }
  $db->query("INSERT INTO ".$tb." (" .$field.") VALUES (" . $data . ")");
}
function update($ary,$tb){
  global $db;
foreach($ary as $do => $data){
  switch($do){
    case 'num+1':
    $db->query("UPDATE ".$tb." SET num=num+1 WHERE id=" .$data);
    break;
    case 'num-1':
    $db->query("UPDATE ".$tb." SET num=num-1 WHERE id=" .$data);
    break;
    default:
    foreach($data as $key => $value){
      $db->query("UPDATE ".$tb." SET ".$do."='".$value."' WHERE id=".$key);
      // echo "UPDATE ".$tb." SET ".$do."='".$value."' WHERE id=".$key;
      // print "<br>";
    }
  }
}
}
function delete($ary,$tb){
  global $db;
  foreach ($ary as $do => $data){
    switch($do){
      case 'del':
      foreach($data as $key => $value){
        $db->query("DELETE FROM ".$tb." WHERE id=".$value);
      }
      break;
      case 'delat':
      $db-query("DELETE FROM ".$tb." WHERE ".$data);
      break;
    }
  }
}

function getmax(){
  global $db; 
  $row=$db->query("select COUNT(*) from cwl_plight where 1")->fetch();
  return ceil($row[0]/5);
}
function addfile($file){
  $newname=time()."_".$file['name'];
  copy($file['tmp_name'],"upload/".$newname);
  return $newname;
}
?>