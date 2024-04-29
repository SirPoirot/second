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


$sql = "
    SELECT user_id,password FROM members WHERE user_id = '".$id."'
";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);


        if ($row['user_id']) {
            if($row['password'] == $pw){
            session_start();

            $_SESSION["ss_id"] = $id;

            echo "<script>
            alert('로그인 성공했습니다.');
            self.location.href='member.php'; //회원전용페이지로 이동
            </script>
        ";
            }
            else{
                echo "<script>
                    alert('비밀번호가 틀립니다.');
                    self.location.href='index.php';
                    </script>
                ";
            }
        }
        else {
            echo "<script>
                    alert('로그인 실패했습니다.');
                    self.location.href='index.php';
                    </script>
                ";
        }
        


