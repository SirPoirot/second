<?php
$conn = mysqli_connect('localhost', 'root', '', 'myfirst');

$sql = "
    INSERT INTO make(
        title, content, created)
        VALUES(
            '{$_POST['title']}',
            '{$_POST['content']}',
            NOW()
            )
";

$result = mysqli_query($conn,$sql);

if($result === false){
    echo "문제가 생겼음";
}
else{
    header("Location: community.php");
    exit();
}
