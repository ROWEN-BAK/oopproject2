<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Park Reviews & CO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">RD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=showParks">Parken</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?action=userreviews">User Reviews</a>
                </li>
                {if $isLoggedIn}
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=profile">Profiel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=logout">Logout</a>
                    </li>
                {else}
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=loginForm">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?action=register">Registreren</a>
                    </li>
                {/if}
            </ul>
        </div>
    </div>
</nav>

<br>
<div class="container">
    {block name="content"}

    {/block}
</div>
<br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>
