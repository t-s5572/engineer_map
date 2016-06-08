<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>学習法詳細</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>

<?php 
include("func.php");
    
$pdo = db_con();
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT content_table.content_title,content_table.content_message,step_table.id as step_id,step_table.step_title, step_table.step_message FROM content_table 
  INNER JOIN step_table ON content_table.id = step_table.content_id ;");
$status = $stmt->execute();

$stmt2 = $pdo->prepare("SELECT author_table.id as author_id ,author_table.author_name,author_table.author_message, content_table.content_title,content_table.content_message FROM author_table 
  INNER JOIN content_table ON author_table.id = content_table.author_id LIMIT 1;");
$status2 = $stmt2->execute();    
//３データ表示
$view="";
$content_title = "";
$author_image = "";
$author_name = "";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
    //管理FLGで表示を切り分けたりしてみましょう！！！（追加してください！）
    $view .= 
        '<div class="step">'.$result["step_id"].'</div>
        <div class="author">
        <img class="author_img" src="step_image.php?id='.$result["step_id"].'" alt="">
       <p class="author_title">'.$result["step_title"].'</p>
       <p class="author_msg">'.$result["step_message"].'</p>
       </div>';
  }

}
    

if($status2==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result2 = $stmt2->fetch(PDO::FETCH_ASSOC) ){
    //管理FLGで表示を切り分けたりしてみましょう！！！（追加してください！）
    $content_title .=$result2["content_title"];
    $author_image  .= '<img src="author_image.php?id='.$result2["author_id"].'" alt="">';
    $author_name.=$result2["author_name"];
  }

} 
    
?>    

<body>
    <header>
        <div class="hero">
            <div id="head">
                <img id="logo" src="./imgs/logo.svg" href="index.php" alt="">
                <!--      ナビゲーション　　-->
                <nav>
                    <ul>
                        <li><a class="kanri" id="point-btn">ポイント</a></li>
                        <li><a class="kanri" id="ranking-btn">ランキング</a></li>
                        <li><a class="kanri" href="">管理ページ</a></li>
                    </ul>
                </nav>
                <!--      ナビゲーション　　-->

            </div>
            <div id="hero_msg">
                <p id="main_msg1"><?=$content_title?></p>
                <?=$author_image ?>
                <p id="main_msg2"><?=$author_name?></p>
            </div>
        </div>
    </header>

    <!--            ランキング　           　-->
    <div id="ranking">
        <p id="ranking_msg">ステップ</p>
        <!--          作者情報を三回くりかえす　　　　　　-->
        <?=$view?>
    </div>
    <p id="pageTop"><a href="#">page top</a></p>
    <footer></footer>

</body>

</html>