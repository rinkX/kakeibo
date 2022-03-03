<?php
include_once('./dbconnect.php');

//処理の流れ
//1.画面で入力された値の取得
//2.PHPからMySQLへ接続
//SQL文を作成して、画面で入力された値をrecordsテーブルに追加
//index.phpに遷移する

$date=$_POST['date'];
$title=$_POST['title'];
$amount=$_POST['amount'];
$type=$_POST['type'];
$id=$_POST['id'];

echo $type;

$sql="update records set title=:title,type=:type,amount=:amount,date=:date,updated_at=now() where id=:id";

$stmt=$pdo->prepare($sql);

$stmt->bindParam(':title',$title,PDO::PARAM_STR);
$stmt->bindParam(':type',$type,PDO::PARAM_INT);
$stmt->bindParam(':amount',$amount,PDO::PARAM_INT);
$stmt->bindParam(':date',$date,PDO::PARAM_STR);
$stmt->bindParam(':id',$id,PDO::PARAM_INT);

$stmt->execute();

header('Location:./index.php');
exit();

?>