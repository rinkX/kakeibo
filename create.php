<?php

//dbconnect.phpを読み込む➔DB接続
include_once('./dbconnect.php');



//新しいレコードを追加するための処理
//処理の流れ
//最終のゴール：新しい家計簿が追加されて、TOPに戻る

//1.画面で入力された値の取得
//2.PHPからMySQLへ接続
//SQL文を作成して、画面で入力された値をrecordsテーブルに追加
//index.phpに遷移する

$date=$_POST['date'];
$title=$_POST['title'];
$amount=$_POST['amount'];
$type=$_POST['type'];


$sql="insert into records(title,type,amount,date,created_at,updated_at)
    VALUES(:title,:type,:amount,:date,now(),now())";
//先ほど作成したSQLを実行できるように準備
$stmt=$pdo->prepare($sql);

//値の設定
$stmt->bindParam(':title',$title,PDO::PARAM_STR);
$stmt->bindParam(':type',$type,PDO::PARAM_INT);
$stmt->bindParam(':amount',$amount,PDO::PARAM_INT);
$stmt->bindParam(':date',$date,PDO::PARAM_STR);

//SQL実行
$stmt->execute();

//index.phpに遷移
header('Location:./index.php');




?>