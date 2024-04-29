<?php
$conn = mysqli_connect('localhost', 'root', '', 'myfirst');

// 한 페이지 게시글 수
$limit = 10;
// 각 페이지의 페이지 넘버 최대
$page_limit = 5;

// GET으로 받아온 현재 페이지
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// 시작 게시글 번호 ex) 1번페이지에서는 0번부터9번 2번에서는 10번부터19번
$start = ($page -1) * $limit;
if($start < 0) $start = 0;

$sql = "
        SELECT * FROM make;
    ";

$result = mysqli_query($conn, $sql);
$talbe_content = '';

$sql = "
    SELECT COUNT(*) AS row_cnt FROM make;
";
$result = mysqli_query($conn,$sql);

if($result){
    $row = mysqli_fetch_array($result);
    $total = $row['row_cnt']; // 총 게시물 수
}

$sql_show = "
        SELECT * FROM make LIMIT $start,$limit;
    ";

$result_show = mysqli_query($conn,$sql_show);
// 결과를 받아와서 출력할 변수에 넣는 작업

while($tmp = mysqli_fetch_array($result_show)){

    $title = $tmp['title'];
    $content = $tmp['content'];
    $id = $tmp['id'];
    $date = date('Y-m-d', strtotime($tmp['created']));
    $talbe_content .= '
        
        <tr>
            <th scope="row">' . $id . '</th>
            <td><a href="show_content.php?id=' . $id . '&title=' . $title . '&content=' . $content . '&date=' . $date . '">' . $title . '</a></td>
            <td>' . $date . '</td>
        </tr>

        ';
}

// 총 페이지 수
$total_page = ceil($total/$limit);

$btn_first = "<a href='community.php?page=1'><button type=\"button\" class=\"btn btn-outline-primary\">First</button></a>";
$btn_last = "<a href='community.php?page=".$total_page."'><button type=\"button\" class=\"btn btn-outline-primary\">Last</button></a>";

$next_page = $page+1;
$btn_next = "<a href='community.php?page=".$next_page."'><button type=\"button\" class=\"btn btn-info\">></button></a>";
$prev_page = $page-1;
$btn_prev = "<a href='community.php?page=".$prev_page."'><button type=\"button\" class=\"btn btn-info\"><</button></a>";

$end = $start + $limit;

$start_page = floor(($page -1) / $page_limit) * $page_limit + 1;
$end_page = $start_page + $page_limit - 1;
if($end_page > $total_page){
    $end_page = $total_page;
}

$btns_num = '';
for($i = $start_page; $i <= $end_page; $i++){
    if($page == $i){
        $btns_num .= "<button type=\"button\" class=\"btn btn-info\">$i</button>";
    }else{
        $btns_num .= "<a href='community.php?page=".$i."'><button type=\"button\" class=\"btn btn-primary\">$i</button></a>";
    }
}
?>

<!doctype html>
<html lang="en">
<a href=""></a>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                        <a class="nav-link" href="./community.php">게시판</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login/">로그인</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
                        aria-label="Search">
                </form>

                <div class="text-end">
                    <a href="create.php"><button type="button" class="btn btn-outline-light me-2">글쓰기</button></a>
                </div>
            </div>
        </div>

    </header>


    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">제목</th>
                            <th scope="col">날짜</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $talbe_content ?>
                    </tbody>
                </table>

            </div>
            <div class="col-md-4">
                <div class="bd-example-snippet bd-code-snippet">
                    <div class="bd-example m-0 border-0">

                    </div>
                </div>
            </div>
        </div>

    </main>
    <div class="text-center w-75">
        <div class="btn-group me-2" role="group" aria-label="First group">
        <?=$btn_first?>
        <?=$btn_prev?>
        <?=$btns_num?>
        <?=$btn_next?>
        <?=$btn_last?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>