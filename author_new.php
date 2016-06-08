<?php
include("html_start.php");
?>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">作家登録</a></div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form enctype="multipart/form-data" method="post" action="insert.php">
        <div class="jumbotron">
            <fieldset>
               
                <legend>作家登録</legend>
                <label>画像：
                <div class="imgInput">
                    <input type="file" name="image">
                    <img src="imgs/no-image.png" alt="" class="imgView">
                </div>
                <!--/.imgInput-->
                </label>
                <br>
                <label>名前：
                    <input type="text" name="name">
                </label>
                <br>
                <label>経歴：
                    <textarea name="message" id="message" cols="30" rows="10"></textarea>
                </label>
                <br>

                    <input type="hidden" name="id"></input>
                    <input type="submit" value="データを登録">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->
    <?php
include("html_end.php");
?>