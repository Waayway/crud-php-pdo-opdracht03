<?php 
require 'connect.php';
$sql = "DELETE FROM achtbaan WHERE id=:id";
$stmnt = $pdo->prepare($sql);
$stmnt->bindValue(":id", $_GET["id"]);
$stmnt->execute();
header("Location: index.php");
?>