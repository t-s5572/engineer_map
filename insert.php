<!--作家登録フォーム-->
<?php
include("func.php");


$fp = fopen($_FILES["image"]["tmp_name"], "rb");
$insert_image = fread($fp, filesize($_FILES["image"]["tmp_name"]));
fclose($fp);
$insert_ext = pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION);
$insert_name = $_POST["name"];
$insert_message = $_POST["message"];
$insert_time = date("Y-m-d H:i:s");


$pdo = db_con();

$stmt = $pdo->prepare("INSERT INTO author_table (ext,author_image, author_name,author_message, indate) VALUES (:ext,:image, :name, :message, :indate)");

$stmt->bindValue(":ext",$insert_ext,PDO::PARAM_STR);
$stmt->bindValue(":image",$insert_image,PDO::PARAM_LOB);
$stmt->bindValue(":name",$insert_name,PDO::PARAM_STR);
$stmt->bindValue(":message",$insert_message,PDO::PARAM_STR);
$stmt->bindValue(":indate",$insert_time,PDO::PARAM_STR);

$status = $stmt->execute();

header("Location: author_list.php");

?>

