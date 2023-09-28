<?php
session_start();
include './../env.php';

$title =trim($_REQUEST['title']);
$author =trim($_REQUEST['author']);
$description =trim($_REQUEST['description']);
$errors=[];


if(empty($title)){
   $errors['title_error']='title is required';
//    header('location:./../index.php');
}else{
    if(strlen($title)>100){
        $errors['title_error']="only 50 Char";
    }else{
        // $errors['Title error']="fine";
    }
}
echo "<br>";


if(empty($author)){
    $errors['author_error']='author is required';
 }else{
     if(strlen($author)>50){
        $errors['author_error']="only 50 Char";
     }else{
        // $errors['author error']= "fine";
     }
 }
 echo "<br>";


 if(empty($description)){
    $errors['description_error']='Description is required';
 }else{
     if(strlen($description)>250){
        $errors['description_error']= "only 50 Char";
     }else{
        // $errors['Description error']= "fine";
     }
 }


if(count($errors)>0){
    $_SESSION =$errors;
    header('location: ./../create.php');
}else{
    
    $query ="INSERT INTO posts( title, author, description) VALUES ('$title','$author','$description')";
    $result = mysqli_query( $conn ,$query);

    if ($result) {
        $_SESSION['smsg']="post has been inserted successfully";
        header('location: ./../create.php');
    }else{
        $_SESSION['fmsg']="Something wrong";
        header('location: ./../create.php');
    }

}