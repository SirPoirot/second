<?php
    $conn = mysqli_connect('localhost', 'root', '', 'myfirst');

    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];

    $sql = "
       UPDATE make
       SET 
       title = '{$title}',
       content = '{$content}'
       WHERE 
       id = '{$id}';
    ";

    $result = mysqli_query($conn, $sql);

    if($result === false){
        echo "문제가 생겼음";
    }
    else{
        header("Location: community.php");
        exit();
    }
