<?php
include './env.php';
$postid=$_REQUEST['id'];
$query ="SELECT * FROM posts WHERE id='$postid'";
$result =mysqli_query($conn,$query);
$post =mysqli_fetch_assoc($result);
// echo '<pre>';
// print_r($post['']);
// echo '</pre>';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./view.css">
</head>
<body>
    <nav id="nav">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./create.php">Add New Post</a></li>
                <li><a href="./bloglist.php">Blog List</a></li>
            </ul>
        </nav>
        <Div class="div1">
            <Div>
                <h1><?=$post['title']?></h1>
            </Div>
            <Div>
                <p>
                <?=$post['description']?>
                </p>
            </Div>
            <p>
            by  <?=$post['author']?>
            </p>
        </Div>