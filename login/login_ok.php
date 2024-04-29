<?php
$conn = mysqli_connect('localhost', 'root', '', 'myfirst');

$id = (isset($_POST['id']) && $_POST['id'] != '') ? $_POST['id'] : '';
$pw = (isset($_POST['pw']) && $_POST['pw'] != '') ? $_POST['pw'] : '';


if ($id == '') {
    echo "
        <script> 
        alert('아이디를 입력하세요.')
        history.go(-1)
        </script>
        ";
    exit;
}
if ($pw == '') {
    echo "
        <script> 
        alert('비밀번호를 입력하세요.')
        history.go(-1)
        </script>
        ";
    exit;
}

$sql_id = "
        SELECT user_id FROM members;
    ";
$sql_pw = "
        SELECT password FROM members;
    ";
$result_id = mysqli_query($conn, $sql_id);
$result_pw = mysqli_query($conn, $sql_pw);
while ($row_id = mysqli_fetch_array($result_id)) {
    while ($row_pw = mysqli_fetch_array($result_pw)) {
        if ($id == $row_id['user_id'] && $pw === $row_pw['password']) {
            session_start();

            $_SESSION["ss_id"] = $id;

            echo "<script>
            alert('로그인 성공했습니다.');
            self.location.href='member.php'; //회원전용페이지로 이동
            </script>
        ";
        }
        else {
            echo "<script>
                    alert('로그인 실패했습니다.');
                    self.location.href='index.php';
                    </script>
                ";
        }
        
    }
}

