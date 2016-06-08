<?php
include("func.php");

$id = $_GET["id"];
$pdo = db_con();

$stmt = $pdo->prepare("SELECT * FROM author_table where id = :id");
$stmt->bindValue(":id",$id,PDO::PARAM_STR);
$status = $stmt->execute();


//Content-typeテーブル  
$contents_type = array(
 'jpg'  => 'image/jpeg',
 'jpeg' => 'image/jpeg',
 'png'  => 'image/png',
 'gif'  => 'image/gif',
 'bmp'  => 'image/bmp',
);

// 出力
$img = $stmt->fetchObject();
header('Content-type: ' . $contents_type[$img->ext]);
echo $img->author_image;


?>