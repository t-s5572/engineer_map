<?php

include("func.php");

//1.GETでidを取得
$id = $_GET["id"];


//2.DB接続など
$pdo = db_con();

//3.SELECT * FROM gs_an_table WHERE id=***; を取得
$stmt = $pdo->prepare("SELECT * FROM author_table WHERE id= :id");
$stmt-> bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();


//4.select.phpと同じようにデータを取得（以下はイチ例）
 while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $one_id = $result["id"];
    $name = $result["author_name"];
    $message = $result["author_message"];
    $indate = $result["indate"];
  }


?>
<?php
//1.GETでidを取得
$content_id = $_GET["id"];


//2.DB接続など
$pdo2 = db_con();

//3.SELECT * FROM gs_an_table WHERE id=***; を取得
$stmt2 = $pdo2->prepare("SELECT * FROM content_table WHERE author_id= :id");
$stmt2-> bindValue(":id", $id, PDO::PARAM_INT);
$status2 = $stmt2->execute();

$view = "";


//4.select.phpと同じようにデータを取得（以下はイチ例）
 while( $result = $stmt2->fetch(PDO::FETCH_ASSOC)){
    $view .= '<p><a href="content_detail.php?id='.$result["id"].'">'.$result["content_title"]." : ".$result["content_message"].'</a></p>';
}

?>
<?php
include("html_start.php");
?>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="author_list.php">データ一覧</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form enctype="multipart/form-data"  method="post" action="author_edit.php">
  <div class="jumbotron">
   <fieldset>
    <legend>講師詳細</legend>
    <p>id名:<?=$one_id?></p>
    <p>作成日:<?=$indate?></p>
    <label>画像：
    <div class="imgInput">
        <input type="file" name="image">
        <img src="author_image.php?id=<?=$one_id?>" alt="" class="imgView">
    </div>
    </label>
    <br>
     <label>名前：<input type="text" name="name" value="<?=$name?>"></label><br>
     <label>
     <textArea name="message" rows="10" cols="100"><?=$message?></textArea>
     </label><br>
     <input type="hidden" name="id" value= "<?=$one_id?>"></input>
     <input type="submit" value="データを更新">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
<form method="post" action="author_delete.php">
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" value="削除">
</form>

<!--コンテンツ一覧-->

<?=$view?>



<?php
include("html_end.php")
?>