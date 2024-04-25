<?php
    $conn = mysqli_connect('localhost', 'root', '', 'myfirst');

    $sql = "
        SELECT * FROM make;
    ";

    $result = mysqli_query($conn, $sql);
    $card = '';
    while ($row = mysqli_fetch_array($result)){
        $title = $row['title'];
        $content = $row['content'];
        $id = $row['id'];
          $card .= "<div class=\"card\" style=\"width: 18rem;\">
          <div class=\"card-body\">
              <h5 class=\"card-title\">{$title}</h5>
              <p class=\"card-text\">{$content}</p>

              <form action=\"show_content.php\" method=\"POST\">
              <input type=\"hidden\" name=\"id\" value=\"{$id}\">
              <input type=\"hidden\" name=\"title\" value=\"{$title}\">
              <input type=\"hidden\" name=\"content\" value=\"{$content}\">
              <input type=\"submit\" class=\"btn btn-primary\" value=\"Read\">
              </form>
              
          </div>
      </div>";
    }
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

    
    <div class="container_card">
    <a href="create.php"><button type="button" class="btn btn-primary">글쓰기</button></a>
        <div class="row">
            <div class="col-lg-6">
                <?= $card ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>