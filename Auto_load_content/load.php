<?php

require_once 'config.php';

$count = $_GET['count'];

$query = "SELECT * FROM `content` ORDER BY `date` DESC LIMIT {$count}, 10";
$query = mysqli_query($connect, $query);

$news = array();
while ($row = mysqli_fetch_array($query)) {
    $news[] = $row;
}

echo json_encode($news);