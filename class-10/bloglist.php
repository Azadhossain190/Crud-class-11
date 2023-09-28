<?php
include('./env.php');
$query ="SELECT * FROM posts ";
$result =mysqli_query($conn,$query);
$posts =mysqli_fetch_all($result,1);
// echo '<pre>';
// print_r($posts);
// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<nav id="nav">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./create.php">Add New Post</a></li>
                <li><a href="./bloglist.php">Blog List</a></li>
            </ul>
        </nav>
    <table border="1" width="700px" cellpaddin="5px" cellspacing="" align="center">
        <thead align="center">
            <tr>
                <td>SL.NO</td>
                <td>Title</td>
                <td>Author</td>
                <td>Description</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody align="center">
            <?php
            foreach($posts as $key=> $post){
                ?>
            <tr>
                <td><?= ++$key ?></td>
                <td><?=$post['title']?></td>
                <td><?= $post['author']?></td>
                <td><?= strlen($post['description'])>20 ? substr($post['description'],0,20)."...":$post['description']?></td>
                <td>
                    <a href="./view.php?id=<?=$post['id']?>">View</a>
                    <a href="./edit.php?id=<?=$post['id']?>">Edit</a>
                    <a href="./controller/deletecontroller.php?id=<?=$post['id']?>">Delete</a>
                </td>
            </tr>
            <?php    
        }

            ?>
        </tbody>
    </table>
        
</body>
</html>