<?php
session_start();

include("funcs.php");
$pdo = db_con();


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_an_table");
$status = $stmt->execute();


$view = "";
if($status == false){
    sqlError($stmt);
    }else{
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)){
            $view.='<p>';
            $view.= '<a href="nonuser_detail.php?id=' . $result["id"]. '">';
            $view.= $result["name"];
            $view.= $result["email"];
            $view.='</p>';
        }
    }

    ?>


    <!DOCTYPE html>
    <html lang="ja">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div{padding: 10px;font-size:16px;}</style>
    </head>
    <body id="main">
    <!-- Head[Start] -->
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
    
            <!-- <?php if($_SESSION["kanri_flg"]=="1"){ ?>
            <a class="navbar-brand" href="index.php">データ登録</a>
            <?php } ?> -->
            
            ゲストさん、こんにちは<a href="login.php">ログイン画面に戻る</a>
          </div>
        </div>
      </nav>
    </header>
    <!-- Head[End] -->
    
    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron"><?=$view?></div>
    </div>
    <!-- Main[End] -->
    
    </body>
    </html>
    