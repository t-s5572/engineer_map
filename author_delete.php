<?php
include("func.php");

//①POSTデータ受信
$deleted_id = $_POST["id"];

//②データベース接続
$pdo = db_con();

//③データベースDELETEクエリ飛ばす

$stmt = $pdo->prepare('DELETE FROM author_table WHERE id = :id ');
$stmt->bindValue(":id",$deleted_id,PDO::PARAM_STR);
$status = $stmt->execute();
//④select.phpにリダイレクト

if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    header("Location: author_list.php");
}



?>