<?php
session_start();
include('func.php'); //外部ファイル読み込み（関数群の予定）

$id = $_POST["lid"];
$password = $_POST["lpw"];

$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("ISERT INTO user_table (name, lid, lpw)");
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