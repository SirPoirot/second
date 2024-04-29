<?php
$conn = mysqli_connect('localhost', 'root', '', 'myfirst');


$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] :'';
$pw = (isset($_POST['pw']) && $_POST['pw'] != '') ? $_POST['pw'] :'';
$username = (isset($_POST['username']) && $_POST['username'] != '') ? $_POST['username'] :'';

if($id == ''){
    echo "
    <script> 
    alert('아이디를 입력하세요.')
    history.go(-1)
    </script>
    ";
    exit;
}
if($pw == ''){
    echo "
    <script> 
    alert('비밀번호를 입력하세요.')
    history.go(-1)
    </script>
    ";
    exit;
}
if($username == ''){
    echo "
    <script> 
    alert('닉네임을 입력하세요.')
    history.go(-1)
    </script>
    ";
    exit;
}
$isExist = array();
$already = "
    SELECT user_id FROM members;
";
$result = mysqli_query($conn, $already);
$row = mysqli_fetch_array($result);

while($row = mysqli_fetch_array($result)){
    if($row['user_id'] == $id){
        echo "
        <script> 
        alert('아이디가 중복됩니다.')
        history.go(-1)
        </script>
        ";
    exit;
    }
}

$sql = "
    INSERT INTO members(
        user_id, user_name, password)
        VALUES(
            '{$_POST['id']}',
            '{$_POST['username']}',
            '{$_POST['pw']}'
            )
";

$result = mysqli_query($conn,$sql);
?>

<a class="nav-link" href="index.php">로그인</a>
