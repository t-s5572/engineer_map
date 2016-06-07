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
<body>
   <header>
    <div class="hero">
      <div id="head">
      <img id="logo" src="./imgs/logo.svg"  href="index.php" alt="">
<!--      ナビゲーション　　-->
    <nav>
     <ul>
         <li><a class="kanri" id="point-btn" >ポイント</a></li>
         <li><a class="kanri" id="ranking-btn" >ランキング</a></li>
         <li><a class="kanri" href="">管理ページ</a></li>
     </ul>
     </nav>
<!--      ナビゲーション　　-->     
      
      </div>
       <div id="hero_msg">
       <p id="main_msg1">有名エンジニアがあなたのすぐそばに・・・</p>
       <p id="main_msg2">〜最適な学習方法をお届け〜</p>
       <div id="main-btn" ><a href="#ranking">今すぐ始める</a></div>
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
    <img class="rank3"  src="./imgs/third.png" alt="">
      <p id="ranking_msg">ランキング</p>
<!--          作者情報を三回くりかえす　　　　　　-->
       <div class="author">
           <img class="author_img" src="./imgs/yamazaki.jpg" alt="">
           <p class="author_title">山崎大助</p>
           <p class="author_msg">数々のIT系メディアに登場し、アジアで唯一（世界10人中の1名）のMicrosoft MVP（Bing Maps Development）に3年連続選ばれた業界最前線で活躍するクリエイター。デジタルハリウッド大学院准教授。Bing関連だけでなくHTML5やWeb関連技術の普及に尽力しつつ、IT系メディアでの寄稿、書籍の執筆・連載でも人気。</p>
       </div>
       <div class="author">
           <img class="author_img" src="./imgs/efusin.png" alt="">
           <p class="author_title">藤川真一 （えふしん）</p>
           <p class="author_msg">FA装置メーカー、Web制作のベンチャーを経て、2006年にGMOペパボへ。ショッピングモールサービスにプロデューサーとして携わるかたわら、2007年からモバイル端末向けのTwitterウェブサービス型クライアント『モバツイ』の開発・運営を個人で開始。2010年マインドスコープを設立し、2012年4月30日まで代表取締役社長を務める。その後、想創社（version2）を設立しiPhoneアプリ『ShopCard.me』を開発。2014年8月からBASE（ベイス）株式会社の取締役CTOに就任</p>
       </div>
       <div class="author">
           <img class="author_img" src="./imgs/kasugai.png" alt="">
           <p class="author_title">春日井 良隆</p>
           <p class="author_msg">岐阜大学を卒業後、大沢商会を経て、1997 年にアドビ システムズに入社。2007 年にマイクロソフト初のデザインツールであるExpression のプロダクトマネージャーとして、マイクロソフトに入社。その後、Silverlight のプロダクトマネージャーを兼務し、両製品のマーケティングを統括する。2009 年にエバンジェリズム部門に異動。HTML5やInternet Explorer、UXの啓蒙を進める一方で、近年では学生向けのプログラミングやビジネスプランニング、マーケティング教育にも取り組んでいる。</p>
       </div>
   </div>
                <!--   フッター　　-->
    <p id="pageTop"><a href="#">page top</a></p>
   <footer></footer>
    
</body>
</html>