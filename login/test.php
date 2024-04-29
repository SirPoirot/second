<?php
$conn = mysqli_connect('localhost', 'root', '', 'myfirst');


$sql = "
    SELECT user_id,password FROM members WHERE user_id = 'kim';
";

$result = mysqli_query($conn, $sql);  

$row = mysqli_fetch_assoc($result);

print_r($row);
?>

<a class="nav-link" href="index.php"><?=$row['user_id']?></a>
