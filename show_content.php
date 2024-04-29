<?php
$conn = mysqli_connect('localhost', 'root', '', 'myfirst');

$sql = "
        SELECT * FROM make;
    ";

$result = mysqli_query($conn, $sql);


$title = $_GET['title'];
$content = $_GET['content'];
$id = $_GET['id'];
$date = $_GET['date'];


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



    <main class="container">
        <div class="row g-5">
            <div class="col-md-8">
                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1">
                        <font style="vertical-align: inherit;"><?= $title ?></font>
                    </h2>
                    <p class="blog-post-meta">
                        <font style="vertical-align: inherit;"><?= $date ?></font></a>
                    </p>
                    <hr>
                    <br>
                    <div class="btn btn-primary btn-sm">
                        <form action="process_delete.php" method="POST">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="submit" value="삭제"
                                style="background-color:transparent; border:0px transparent solid;">
                        </form>
                    </div>
                    <div class="btn btn-secondary btn-sm">
                        <form action="update.php" method="POST">
                            <input type="hidden" name="title" value="<?= $title ?>">
                            <input type="hidden" name="content" value="<?= $content ?>">
                            <input type="hidden" name="id" value="<?= $id ?>">
                            <input type="submit" value="수정"
                                style="background-color:transparent; border:0px transparent solid;">
                        </form>
                    </div>
                    <br>
                    <br>
                    <p>
                        <font style="vertical-align: inherit;"><?= $content ?></font>
                    </p>
                </article>
            </div>
            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                </div>
            </div>
        </div>

    </main>




    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>