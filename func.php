<?php
//DB接続
function db_con(){
    try{
        return new PDO('mysql:dbname=engineer_db;charset=utf8;host=localhost','root','');
    }catch(PDOException $e){
        exit("DBconnectingerror:".$e->getMessage());
    }
    
}

//認証OK時の初期値セット
function loginSessionSet(){
    session_regenerate_id();
    $_SESSION["chk_ssid"] = session_id();
}

//セッションチェック用関数
function sessionCheck(){
    if( !isset($_SESSION["chk_ssid"]) || ($_SESSION["chk_ssid"] != session_id()) ){
    echo "LOGIN ERROR";
    exit();
    };
}

//ログイン時のセッションへの情報セット
function loginRollSet(){

}

//HTML XSS対策
function htmlEnc($value) {
    return htmlspecialchars($value,ENT_QUOTES);
}
?>
