<?php
$conn = mysqli_connect('localhost', 'root', '', 'myfirst');

$sql = "
    DELETE FROM make 
    WHERE id = '{$_POST['id']}';
";


$result = mysqli_query($conn,$sql);

if($result === false){
    echo "문제가 생겼음";
}
else{
    header("Location: community.php");
    exit();
}
