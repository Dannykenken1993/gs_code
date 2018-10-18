<?php
session_start();//sessionは、どこからでもデータを取り出せるようにする仕組み

$_SESSION["name"]="yamazaki";
$_SESSION["count"] += 1;
echo $_SESSION["count"];




?>