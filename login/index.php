<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="login.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                        <a class="nav-link" href="../community.php">게시판</a>
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
    <div style="margin-top: 200px;">
        <form class="w-25 mx-auto" action="login_ok.php" method="POST">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating ">
                <input type="text" class="form-control" id="id" placeholder="ID" name="id">
                <label for="floatingInput">ID</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="pw" placeholder="Password" name="pw">
                <label for="floatingPassword">Password</label>
            </div>

            <!-- <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div> -->

            <br>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
        <div style="margin-top: 20px;" class="mx-auto w-25">
            <a href="signup.php"><button type="button" class="btn btn-success">회원가입</button></a>
        </div>
    </div>
    <a href="member.php">회원전용 페이지</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</body>

</html>