<?php
require_once '../dbkoneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM kartu WHERE id= ?";
$r = $dbh->prepare($sql);
$r->execute(array($id));
header('location:../app.php?page=kartu');

?>