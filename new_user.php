<?php
//1. HTML_STARTをインクルード
include("html_start.php");
?>

    <!-- login_act.php は認証処理用のPHPです。 -->
    <p id="login-message">新規登録</h1>
    <div class="form-container">
       
        <form name="form1" action="new_act.php" method="post">
           <div class="form-contain">
                <label class="login-text">ログインID:
                    <br>
                    <input id="login" type="text" name="lid" />
                </label>
            </div>
            <div class="form-contain">
            <label class="login-text">パスワード:
                <br>
                <input id="login" type="password" name="lpw" />
            </label>
            </div>
            <input id="entry_btn" class="btn btn-primary btn-block btn-lg" type="submit" value="新規登録" />
            
        </form>
    </div>

    <?php
//2. HTML_ENDをインクルード
include("html_end.php");
?>