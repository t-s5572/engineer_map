<?php
session_start();
include('func.php'); //外部ファイル読み込み（関数群の予定）

$id = $_POST["lid"];
$password = $_POST["lpw"];

try {
  $pdo = new PDO('mysql:dbname=engineer_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM user_table WHERE lid = :lid AND lpw = :lpw AND life_flg = 0");
$stmt->bindValue(':lid', $id);
$stmt->bindValue(':lpw', $password);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

//３．抽出データ数を取得
//$count = $stmt->fetchColumn(); 
//SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//４. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  header("Location: author_list.php");
}else{
  //logout処理を経由して全画面へ
  header("Location: login.php");
}

exit();



?>
