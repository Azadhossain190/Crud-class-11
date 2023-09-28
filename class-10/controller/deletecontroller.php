<?php
$postId =$_REQUEST['id'];
include './../env.php';



$qurey="DELETE FROM posts WHERE id=$postId";
$result =mysqli_query($conn,$qurey);
header('location: ./../bloglist.php');

?>