<?php
include './env.php';
$postid=$_REQUEST['id'];
$query ="SELECT * FROM posts WHERE id='$postid'";
$result =mysqli_query($conn,$query);
$post =mysqli_fetch_assoc($result);
?>
<?php
    session_start();
    
    // echo '<pre>';
    //     print_r($_SESSION['title_error']);
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
    <link rel="stylesheet" href="./create.css">
</head>
<body>
<nav id="nav">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./create.php">Add New Post</a></li>
                <li><a href="./bloglist.php">Blog List</a></li>
            </ul>
        </nav>
    <?php
    echo isset($_SESSION['smsg']) ? $_SESSION['smsg']:""; 
    
    
        
    ?>
    <div class="container">

    <form action="./controller/updatecontroller.php?id=<?=$post['id']?>" method="POST" class="" >
        <input value="<?=$post['title']?>" type="text" placeholder="Post Title" name="title" ><br>
        <?php
        echo isset($_SESSION['title_error']) ? $_SESSION['title_error']:"";
        echo '<br>';
        ?>
        <br>
        <input value="<?=$post['author']?>" type="text" placeholder="Author name" name="author"><br>
        <?php
        echo isset($_SESSION['author_error']) ? $_SESSION['author_error']:"";
        echo '<br>';
        ?>
        
        <textarea placeholder="Post Description" name="description"><?=$post['description']?></textarea><br>
        <?php
        echo isset($_SESSION['description_error']) ? $_SESSION['description_error']:"";
        echo '<br>';
        ?>
        
        <button type="submit">Update Post</button>
    </form>

    </div>
</body>
</html>
<?php
session_unset();
?>