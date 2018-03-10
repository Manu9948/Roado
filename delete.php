<?php
include("config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM stores1 WHERE id=$id");

header("Location:index.php");
?>
