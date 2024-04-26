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

    
?>


<!doctype html>
<html lang="en">

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
                        <a class="nav-link" href="#">Link</a>
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

    <div class="container_create">
        <form action="process_update.php" method="POST">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">제목</label>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="title" value="<?=$title?>">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">내용</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="content" value="<?=$content?>">
        </div>
        <input type="submit" class="btn btn-success" value="수정">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>