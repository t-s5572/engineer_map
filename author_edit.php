<?php
include("func.php");
//1.POSTでParamを取得
$fp = fopen($_FILES["image"]["tmp_name"], "rb");
$updated_image = fread($fp, filesize($_FILES["image"]["tmp_name"]));
fclose($fp);
$updated_ext = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
$updated_name =$_POST["name"];
$updated_message =$_POST["message"];
$updated_id =$_POST["id"];


//2.DB接続など

$pdo = db_con();
//3.UPDATE gs_an_table SET ....; で更新
//基本的にinsert.phpの処理の流れです。
$stmt = $pdo->prepare("UPDATE author_table SET author_image = :image,ext = :ext,author_name = :name, author_message = :message WHERE id = :id");
$stmt-> bindValue(":image", $updated_image, PDO::PARAM_LOB);
$stmt-> bindValue(":ext", $updated_ext, PDO::PARAM_STR);
$stmt-> bindValue(":name", $updated_name, PDO::PARAM_STR);
$stmt-> bindValue(":message", $updated_message, PDO::PARAM_STR);
$stmt-> bindValue(":id", $updated_id, PDO::PARAM_STR);

$status = $stmt->execute();

if($status == false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".error[2]);
}else{
    header("Location: author_list.php");
}

?>