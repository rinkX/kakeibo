<?php
include_once('./dbconnect.php');

$id=$_GET['id'];

//DB接続
//DELETEのSQLを準備
//TOPに移動

$sql="delete from records where id=:id";

$stmt=$pdo->prepare($sql);
$stmt->bindParam(':id',$id,PDO::PARAM_INT);
$stmt->execute();

header('Location:./index.php');
exit();





?>