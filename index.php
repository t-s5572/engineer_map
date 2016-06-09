<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ENMAP</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/top.js"></script>
</head>

<?php 
include("func.php");
    
$pdo = db_con();
//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT author_table.id as author_id ,author_table.author_name,author_table.author_message,content_table.id, content_table.content_title,content_table.content_message FROM author_table 
  INNER JOIN content_table ON author_table.id = content_table.author_id LIMIT 3;");
$status = $stmt->execute();
//３データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC) ){
    //管理FLGで表示を切り分けたりしてみましょう！！！（追加してください！）
    $view .= 
        '<div class="author">
        <img class="author_img" src="author_image.php?id='.$result["author_id"].'" alt="">
       <p class="author_title"><a href="main.php?id='.$result["id"].'">'.$result["content_title"].'</a></p><p>'.$result["author_name"]
        .'</p><p class="author_msg">'.$result["content_message"].'</p>
       </div>';
  }

}    
?>

    <body>
        <header>
            <div class="hero">
                <div id="head">
                    <img id="logo" src="./imgs/logo.svg" href="index.php" alt="">
                    <!--      ナビゲーション1　　-->
                    <nav>
                        <ul>
                            <li><a class="kanri" id="point-btn">ポイント</a></li>
                            <li><a class="kanri" id="ranking-btn">ランキング</a></li>
                            <li><a class="kanri" href="login.php">ログイン</a></li>
                            <li><a class="kanri" href="new_user.php">新規登録</a></li>
                        </ul>
                    </nav>
                    <!--      ナビゲーション1　　-->
                </div>
                <!--      ナビゲーション2　　-->
                    <nav>
                        <ul>
                            <li><a class="kanri " id="point-btn">ポイント</a></li>
                            <li><a class="kanri" id="ranking-btn">ランキング</a></li>
                            <li><a class="kanri" href="login.php">ログイン</a></li>
                            <li><a class="kanri" href="new_user.php">新規登録</a></li>
                        </ul>
                    </nav>
                    <!--      ナビゲーション2　　-->
                <div id="hero_msg">
                    <p id="main_msg1">ENMAP</p>
                    <p id="main_msg2">有名エンジニアがあなたのすぐそばに・・・
                        <br>〜最適な学習方法をお届け〜</p>
                    <a id="main-btn" href="new_user.php">今すぐ始める</a>
                </div>

            </div>
        </header>


        <div class="container">
            <div id="three_point">
                <p id="three_point_msg">３つのポイント</p>
                <div class="row">
                    <div class="point col-md-4">
                        <img class="icon" src="./imgs/teach.svg" alt="">
                        <p>著名なエンジニアがまとめを担当</p>
                    </div>
                    <div class="point col-md-4">
                        <img class="icon" src="./imgs/shopping-cart.svg" alt="">
                        <p>気になったらすぐに購入可能</p>
                    </div>
                    <div class="point col-md-4">
                        <img class="icon" src="./imgs/ranking-factor.svg" alt="">
                        <p>人気まとめがすぐにわかる</p>
                    </div>
                </div>
            </div>
        </div>


        <!--            ランキング　           　-->
        <div id="ranking">
            <img class="rank1" src="./imgs/first.png" alt="">
            <img class="rank2" src="./imgs/second.png" alt="">
            <img class="rank3" src="./imgs/third.png" alt="">
            <p id="ranking_msg">ランキング</p>
            <!--          作者情報を三回くりかえす　　　　　　-->
            <?=$view ?>
        </div>
        <!--   フッター　　-->
        <p id="pageTop"><a href="#">page top</a></p>
        <footer></footer>

    </body>

</html>